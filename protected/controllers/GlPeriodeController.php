<?php

class GlPeriodeController extends Controller {

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
                'actions' => array('create', 'update', 'showPDF'),
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
        $model = new GlPeriode;
        $mdl = array();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['GlPeriode'])) {
            if (isset($_POST['btnSimpan'])) {
                $conn = Yii::app()->db->beginTransaction();
                try {
                    $model->attributes = $_POST['GlPeriode'];
                    $gl = new fico();
                    $param = array('bulan' => $model->bulan, 'tahun' => $model->tahun, 'id_branch' => $model->id_branch, 'id_orgn' => $model->id_orgn);
                    $retval = $gl->tutupBuku($param);
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
            } elseif (isset($_POST['btnCek'])) {
                $mdl=$this->getSimulasi();
            }
        }
        $this->render('create', array(
            'model' => $model, 'mdl' => $mdl
        ));
    }

    public function getTutupBukuList($param=array()) {
        $sql = "
            Select
  account.id_acc As id_acc,
  account.cd_acc As cd_acc,
  account.nm_acc As nm_acc,account.balance As Saldo,
  Coalesce((Select
    Sum(gl_detail.debet) As debet
  From
    gl_header gl_header Inner Join
    gl_detail gl_detail On gl_header.id_glheader = gl_detail.id_glheader
  Where
    account.id_acc = gl_detail.id_acc And
    Extract(Month From gl_header.tgl_trans) = " . $param['bulan'] . " And
    Extract(Year From gl_header.tgl_trans) = " . $param['tahun'] . " And
    gl_header.id_branch = " . $param['id_branch'] . " And
    gl_header.id_orgn = " . $param['id_orgn'] . "), 0) As debet,
  Coalesce((Select
    Sum(gl_detail.kredit) As kredit
  From
    gl_header gl_header Inner Join
    gl_detail gl_detail On gl_header.id_glheader = gl_detail.id_glheader
  Where
    account.id_acc = gl_detail.id_acc And
    Extract(Month From gl_header.tgl_trans) = " . $param['bulan'] . " And
    Extract(Year From gl_header.tgl_trans) = " . $param['tahun'] . " And
    gl_header.id_branch = " . $param['id_branch'] . " And
    gl_header.id_orgn = " . $param['id_orgn'] . "),0 ) As kredit,
    Substr(account.cd_acc, 1, 1) as grup
From
  account account
Where
  account.level = 3 And
  Substr(account.cd_acc, 1, 1) In ('1', '2', '3')
Order By
  account.cd_acc";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $results = $command->queryAll();
        $count = count($results);
        $dataProvider = new CSqlDataProvider($sql, array(
                    'totalItemCount' => $count,
                    'keyField' => 'id_acc',
                    'pagination' => array(
                        'pageSize' => 50,
                    ),
                ));
        return $dataProvider;
    }

    public function getSimulasi() {
        $model = new GlPeriode;
        $mdl = array();
        if (isset($_POST['GlPeriode'])) {
            $model->attributes = $_POST['GlPeriode'];
            $param = array('bulan' => $model->bulan, 'tahun' => $model->tahun, 'id_branch' => $model->id_branch, 'id_orgn' => $model->id_orgn);
            $mdl = $this->getTutupBukuList($param);
        }
        return $mdl;
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

        if (isset($_POST['GlPeriode'])) {
            $model->attributes = $_POST['GlPeriode'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_glperiode));
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
        $dataProvider = new CActiveDataProvider('GlPeriode');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new GlPeriode('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['GlPeriode']))
            $model->attributes = $_GET['GlPeriode'];

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
        $model = GlPeriode::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'gl-periode-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function actionShowPDF() {
        $model = Account::model()->findAll();
        $this->render('report', array(
            'model' => $model,
        ));
    }
}
