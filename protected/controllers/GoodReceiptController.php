<?php

class GoodReceiptController extends Controller {

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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new GoodReceipt;
        $modelDtl = new GrLine;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['id_product'])) {
            $conn = Yii::app()->db->beginTransaction();
            try {
                $model->attributes = $_POST['GoodReceipt'];

                $modelDtl->id_product = $_POST['id_product'];
                $modelDtl->nm_product = $_POST['nm_product'];
                $modelDtl->qty_trans = $_POST['qty_trans'];
                $modelDtl->id_uoms = $_POST['id_uoms'];
                $modelDtl->id_locator = $_POST['id_locator'];

                $i = 1;
                foreach ($modelDtl->id_product as $value) {
                    $line[] = $i * 10;
                    $val[] = 0;
                    $i++;
                }

                $modelDtl->item_line = $line;
                $modelDtl->value_trans = $val;

                //print_r($modelDtl->attributes);

                $inv = new inventory;
                $retval = $inv->setReceipt($model->attributes, $modelDtl->attributes);

                if ($retval['type'] == 'S') {
                    Yii::app()->user->setFlash('success', $retval['message']);
                    $model = $retval['val'];
                    $conn->commit();
                } else if ($retval['type'] == 'E') {
                    Yii::app()->user->setFlash('error', $retval['message']);
                    if (isset($retval['val']))
                        foreach ($retval['val'] as $key => $value) {
                            Yii::app()->user->setFlash('error', $value[0]);
                        }
                    $conn->rollback();
                }
            } catch (ErrorException $e) {
                $conn->rollback();
                return false;
            }
        }

        $this->render('create', array(
            'model' => $model, 'modeldtl' => $modelDtl
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelDtl = GrLine::model()->findAll('id_receipt=:id_receipt', array(':id_receipt' => $model->id_receipt));

        foreach ($modelDtl as $row) {
            $id_product[] = $row->getAttribute('id_product');
            $nm_product[] = $row->nm_product->nm_product;
            $qty_trans[] = $row->getAttribute('qty_trans');
            $id_uoms[] = $row->getAttribute('id_uoms');
            $id_locator[] = $row->getAttribute('id_locator');
        }
        $modeldtl = new GrLine;
        $modeldtl->id_product = $id_product;
        $modeldtl->nm_product = $nm_product;
        $modeldtl->qty_trans = $qty_trans;
        $modeldtl->id_uoms = $id_uoms;
        $modeldtl->id_locator = $id_locator;

        // print_r($modeldtl);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['id_product'])) {
            $model->attributes = $_POST['GoodReceipt'];
            print_r($modeldtl->attributes);
        }

        $this->render('update', array(
            'model' => $model, 'modeldtl' => $modeldtl
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('GoodReceipt');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new GoodReceipt('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['GoodReceipt']))
            $model->attributes = $_GET['GoodReceipt'];

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
        $model = GoodReceipt::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'good-receipt-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
