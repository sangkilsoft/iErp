<?php

class AccountController extends Controller {

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
                // 'accessControl', // perform access control for CRUD operations
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
                'actions' => array('create', 'update', 'CodeAccount', 'AjaxFillTree'),
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
        $model = new Account;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Account'])) {
            $model->attributes = $_POST['Account'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_acc));
        }

        $this->render('create', array(
            'model' => $model,
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

        if (isset($_POST['Account'])) {
            $model->attributes = $_POST['Account'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_acc));
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
        $dataProvider = new CActiveDataProvider('Account');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Account('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Account']))
            $model->attributes = $_GET['Account'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionCodeAccount() {
        $hasil = "";
        $datapost = (strlen(trim($_POST['idparent']) > 0)) ? $_POST['idparent'] : -1;
        $connection = Yii::app()->db;
        $sql1 = "select cd_acc,level from account b where b.id_acc=$datapost";
        $command1 = $connection->createCommand($sql1);
        $results1 = $command1->queryAll();
        $level = $results1[0]['level'];
        $temp = fico::split('.', $results1[0]['cd_acc']);
        if ($level == 1) {
            $sql = "Select
                      Max(SubString(account.cd_acc From 3 For 2 )) as jum
                    From
                      account
                    Where
                      account.level = " . ($level) . " and parent=" . $datapost . "
                    Group By
                      account.level";
        } elseif ($level == 2) {
            $sql = "Select
                      Max(SubString(account.cd_acc From 6 For 3 )) as jum
                    From
                      account
                    Where
                      account.level = " . ($level) . " and parent=" . $datapost . "
                    Group By
                      account.level";
        }
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $results = $command->queryAll();
        if (intval($level) == 1) {

            $t = intval($results[0]['jum']) + 1;
            if (strlen(strval($t)) == 1) {
                $hasil = $temp[0] . '.0' . $t . '.000';
            } elseif (strlen(strval($t)) == 2) {
                $hasil = $temp[0] . '.' . $t . '.000';
            }
        } elseif (intval($level) == 2) {
            if (empty($results[0]['jum'])) {
                $hasil = $temp[0] . '.' . $temp[1] . '.' . (intval($temp[2]) + 1);
            } else {
                $t = intval($results[0]['jum']) + 1;
                if (strlen(strval($t)) == 1) {
                    $hasil = $temp[0] . '.' . $temp[1] . '.00' . $t;
                } elseif (strlen(strval($t)) == 2) {
                    $hasil = $temp[0] . '.' . $temp[1] . '.0' . $t;
                } else {
                    $hasil = $temp[0] . '.' . $temp[1] . '.' . $t;
                }
            }
        }
        echo $hasil;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Account::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'account-form') {
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
