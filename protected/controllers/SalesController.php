<?php

class SalesController extends Controller {

    public $layout = '//layouts/column2';

    public function actionIndex() {
        $this->render('index');
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
    public function actionSalRequest() {
        $model = new SalRequest;

        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='sal-request-salRequest-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */

        if (isset($_POST['SalRequest'])) {
            $model->attributes = $_POST['SalRequest'];
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }
        $this->render('salRequest', array('model' => $model));
    }

    public function actionSalesOrder() {
        $model = new SalOrder;
        $modeldtl = new SorderLine;
        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='sal-order-salesOrder-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */

        if (isset($_POST['SalOrder'])) {
            $model->attributes = $_POST['SalOrder'];
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }
        $this->render('salesOrder', array('model' => $model, 'modeldtl' => $modeldtl));
    }

    public function actionCustomerList() {
        $tampil = CHtmlPurifier::
                $this->renderPartial('customerList', array(), false, false);
        echo $tampil;
    }

}