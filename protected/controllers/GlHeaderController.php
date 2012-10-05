<?php

class GlHeaderController extends Controller {

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
        $model = new GlHeader;
        $modelDtl = new GlDetail;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['GlHeader'])) {
            $conn = Yii::app()->db->beginTransaction();
            try {
                $model->attributes = $_POST['GlHeader'];
                $modelDtl->id_glheader = $model->id_glheader;                
                $modelDtl->id_acc = $_POST['id_acc'];
                $modelDtl->nm_acc=$_POST['nm_acc'];
                $modelDtl->debet = $_POST['debet'];
                $modelDtl->kredit = $_POST['kredit'];

                $gl = new fico();
                $retval = $gl->setGL($model->attributes, $modelDtl->attributes);
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
        $modelDtl = GlDetail::model()->findAll('id_glheader=:id_glheader', Array(':id_glheader' => $model->id_glheader));
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        foreach ($modelDtl as $row) {
            $id_acc[] = $row->getAttribute('id_acc');
            //$nm_acc[] = $row->nm_acc->nm_acc;
            $debet[] = $row->getAttribute('debet');
            $kredit[] = $row->getAttribute('kredit');
        }
        $modeldtl = new GlDetail;
        $modeldtl->id_acc = $id_acc;
        //$modeldtl->nm_acc = $nm_acc;
        $modeldtl->debet = $debet;
        $modeldtl->kredit = $kredit;
        //print_r($modeldtl);
        if (isset($_POST['GlHeader'])) {
            $conn = Yii::app()->db->beginTransaction();
            try {
                $model->attributes = $_POST['GlHeader'];  
                GlDetail::model()->deleteAll('id_glheader=:id_glheader', Array('id_glheader'=>$model->id_glheader));
                $modelDtl1 = new GlDetail;
                $modelDtl1->id_glheader = $model->id_glheader;
                $modelDtl1->id_acc = $_POST['id_acc'];
                //$modelDtl1->nm_acc = $_POST['nm_acc'];
                $modelDtl1->debet = $_POST['debet'];
                $modelDtl1->kredit = $_POST['kredit'];                
                $gl = new fico();
                $retval = $gl->updateGL($model->attributes, $modelDtl1->attributes);
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
                GlDetail::model()->deleteAll('id_glheader=:id_glheader', Array(':id_glheader' => $id));
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
        $dataProvider = new CActiveDataProvider('GlHeader');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new GlHeader('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['GlHeader']))
            $model->attributes = $_GET['GlHeader'];

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
        $model = GlHeader::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'gl-header-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
