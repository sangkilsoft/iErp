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
                'actions' => array('create', 'update', 'CodeAccount','AjaxFillTree'),
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
        $hasil = 0;
        $datapost = (strlen(trim($_POST['idparent']) > 0)) ? $_POST['idparent'] : -1;
        $pjg = 0;
        $connection = Yii::app()->db;
        $sql1 = "select cd_acc from account b where b.id_acc=$datapost";
        $command1 = $connection->createCommand($sql1);
        $results1 = $command1->queryAll();
        $cd_acc = $results1[0]['cd_acc'];
        if ($datapost <> -1) {
            $pjg = strlen($cd_acc) + 1;
        }
        $sql = "SELECT 
                  max(account.cd_acc) as jum
                FROM 
                  public.account
                where left(cd_acc,$pjg-1)='$cd_acc' and length(cd_acc)=$pjg;
                ";

        $command = $connection->createCommand($sql);
        $results = $command->queryAll();
        if (($results[0]['jum']) != '') {
            $hasil = intval($results[0]['jum']) + 1;
        } else {
            $hasil = strval($cd_acc) . '1';
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

    public function actionAjaxFillTree() {
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
//        $parentId = "NULL";
//        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
//            $parentId = (int) $_GET['root'];
//        }
        $sql = "SELECT 
  a1.cd_acc as id, 
  a1.nm_acc as text,
  a2.cd_acc IS NOT NULL AS hasChildren
FROM 
 account a1 left join account a2 on a1.id_acc = a2.parent
 order by 1";
        $req = Yii::app()->db->createCommand($sql);
        $children = $req->queryAll();

        //$children = $this->createLinks($children);
        $treedata=array();
foreach($children as $child){
     $options=array('href'=>'#','id'=>$child['id'],'class'=>'treenode');
     $nodeText = CHtml::openTag('a', $options);
      $nodeText.= $child['text'];
      $nodeText.= CHtml::closeTag('a')."\n";
      $child['text'] = $nodeText;
      $treedata[]=$child;
}
        echo str_replace(
                '"hasChildren":"0"', '"hasChildren":false', CTreeView::saveDataAsJson($treedata)
        );
        exit();
    }

    private function createLinks($children) {
        $child = array();
        $return = array();
        foreach ($children AS $key => $value) {
            $child['id'] = $value['id'];
            $child['text'] = $value['text'];
            $child['hasChildren'] = $value['hasChildren'];

            if (strlen($value['url']) > 0) {
                $child['text'] = $this->format($value['text'], $value['url'], Yii::app()->request->url);
            }

            $return[] = $child;
            $child = array();
        }

        return $return;
    }

    private function format($text, $url, $icon = NULL) {
        $img = '';
        if (isset($icon))
            $img = '<img src="' . app()->theme->baseUrl . '/images/icons/' . $icon . '">';

        return sprintf('<span>%s</span>', CHtml::link(($img . ' ' . $text), app()->createUrl($url)));
    }

}
