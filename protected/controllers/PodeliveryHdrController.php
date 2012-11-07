<?php

class PodeliveryHdrController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
        $modelBatch = new Batch;
        $modeldtl = new PodeliveryLine;
        $modelrcp = new GreceiptHdr;
        $modelinv = new PoinvoiceHdr;

        $modeld = $modeldtl->model()->findAll('id_delivery=:id_delivery', array(':id_delivery' => $model->getAttribute('id_delivery')));
        foreach ($modeld as $row) {
            //$id_line[] = $row->getAttribute('id_line');
            $id_product[] = $row->getAttribute('id_product');
            $product[] = $row->product->nm_product;
            $qty_trans[] = $row->getAttribute('qty_trans');
            $value_trans[] = $row->getAttribute('value_trans');
            $id_uoms[] = $row->getAttribute('id_uoms');
            $value_disc[] = $row->getAttribute('value_disc');
            $ppn[] = $row->getAttribute('value_tax');
        }

        $modelDtl = new PodeliveryLine;
        //$modelDtl->id_line = $id_line;
        $modelDtl->id_product = $id_product;
        $modelDtl->product = $product;
        $modelDtl->value_disc = $value_disc;

        $modelDtl->id_uoms = $id_uoms;
        $modelDtl->qty_trans = $qty_trans;
        $modelDtl->value_trans = $value_trans;
        $modelDtl->percent_tax = $ppn;
        $modelDtl->value_tax = 0;

        if ($modelrcp->model()->exists('ref_number=:do_num', array(':do_num' => $model->getAttribute('do_num'))))
            $modelRcp = $modelrcp->model()->find('ref_number=:do_num', array(':do_num' => $model->getAttribute('do_num')));
        else
            $modelRcp = $modelrcp;

        $this->render('view', array(
            'model' => $model,
            'modeldtl' => $modelDtl,
            'modelRcp' => $modelRcp,
            'modelBatch' => $modelBatch,
            'modelinv' => $modelinv,
            'modified' => false
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new PodeliveryHdr;
        $modelBatch = new Batch;
        $modelDtl = new PodeliveryLine;
        $modelRcp = new GreceiptHdr;
        $modelinv = new PoinvoiceHdr;

        $modified = true;
        //untuk find delivery
        if (isset($_GET['msg']) && $_GET['msg'] == 'search' && !isset($_POST['yt1'])) {
            if (isset($_POST['PodeliveryHdr'])) {
                $registered = $model->model()->exists('do_num=:do_num', array(':do_num' => $_POST['PodeliveryHdr']['do_num'])) ? true : false;
                if ($registered) {
                    $model = $model->model()->find('do_num=:do_num', array(':do_num' => $_POST['PodeliveryHdr']['do_num']));
                    $this->actionView($model->id_delivery);
                    return;
                }
            }
        //create new delivery
        } elseif (isset($_POST['PodeliveryHdr']) && isset($_POST['yt1'])) {
            $model->attributes = $_POST['PodeliveryHdr'];
            $model->id_orgn = Yii::app()->user->orgn;
            $model->id_branch = Yii::app()->user->branch;
            
            $modelDtl->id_product = $_POST['items']['id_product'];
            $modelDtl->product = $_POST['items']['product'];
            $modelDtl->value_disc = $_POST['items']['value_disc'];

            $modelDtl->id_uoms = $_POST['items']['id_uoms'];
            $modelDtl->qty_trans = $_POST['items']['qty_trans'];
            $modelDtl->value_trans = $_POST['items']['value_trans'];
            $modelDtl->percent_tax = $_POST['items']['ppn'];
            $modelDtl->value_tax = 0;            

            $modelRcp->attributes = $_POST['GreceiptHdr'];
            $modelRcp->id_orgn = Yii::app()->user->orgn;
            $modelRcp->id_branch = Yii::app()->user->branch;
            $modelRcp->receipt_date = new CDbExpression('NOW()');

//            $modelDtl->create_by = 0; //Yii::app()->user->Id;
//            $modelDtl->create_date = new CDbExpression('NOW()');
//            $modelDtl->update_by = 0; //Yii::app()->user->Id;
//            $modelDtl->update_date = new CDbExpression('NOW()');

            $conn = Yii::app()->db->beginTransaction();
            try {
                $podelivery = new purchasing;
                if ($modelRcp->status == 1)
                    $retval = $podelivery->newPODelivery($model->attributes, $modelDtl->attributes, $modelRcp->attributes);
                else
                    $retval = $podelivery->newPODelivery($model->attributes, $modelDtl->attributes);

                if ($retval['type'] == 'E') {
                    Yii::app()->user->setFlash('error', $retval['message']);
                    if (isset($retval['val']))
                        foreach ($retval['val'] as $key => $value) {
                            Yii::app()->user->setFlash('error', $value[0]);
                        }
                    $conn->rollback();
                } elseif ($retval['type'] == 'S') {
                    Yii::app()->user->setFlash('success', $retval['message']);
                    $hasil = $retval['val'];
                    $model = $model->model()->find('do_num=:do_num', array(':do_num' => $hasil->do_num));
                    $conn->commit();
                    
                    $this->actionView($model->id_delivery);
                    return;
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
                $conn->rollback();
            }
        } else
            $model->status = 1;

        $this->render('create', array(
            'model' => $model,
            'modeldtl' => $modelDtl,
            'modelRcp' => $modelRcp,
            'modelBatch' => $modelBatch,
            'modelinv' => $modelinv,
            'modified' => $modified
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['PodeliveryHdr'])) {
            $model->attributes = $_POST['PodeliveryHdr'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_delivery));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('PodeliveryHdr');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PodeliveryHdr('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PodeliveryHdr']))
            $model->attributes = $_GET['PodeliveryHdr'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = PodeliveryHdr::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'podelivery-hdr-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
