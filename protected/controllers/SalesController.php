<?php

class SalesController extends Controller {

    public $layout = '//layouts/column2';

    public function actionIndex() {
        $this->render('index');
    }

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
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionSalesOrder() {
        $this->layout = '//layouts/column1';
        $model = new SalOrder;
        $model->status = 0;
        $modeldtl = new SorderLine;
        $modelinfo = new SorderInfo;

        if (!isset($_POST['batal'])) {
            if (isset($_POST['SalOrder'])) {
                $model->attributes = $_POST['SalOrder'];
                $model->order_date = $this->dateConvert($_POST['SalOrder']['order_date']);
                $model->delivery_schdate = $this->dateConvert($_POST['SalOrder']['delivery_schdate']);

                $model->id_orgn = Yii::app()->user->orgn;
                $model->id_branch = Yii::app()->user->branch;

                //$modeldtl = $_POST['items'];
                //$modelinfo->attributes = $_POST['SorderInfo'];
                if (isset($_POST['search_x'])) {
                    $ada = SalOrder::model()->exists('so_num=:so_num', array(':so_num' => $model->so_num));
                    if ($ada)
                        $model = SalOrder::model()->find('so_num=:so_num', array(':so_num' => $model->so_num));
                }

                $conn = Yii::app()->db->beginTransaction();
                try {
                    if (isset($_POST['btnsave'])) {
                        $mycois = $_POST['btnsave'];
                        switch ($mycois) {
                            case "Save":
                                //creating
                                if ($model->save())
                                    Yii::app()->user->setFlash('success', 'doc.number:' . $model->so_num . ' created..');
                                break;
                            case "Approve":
                                $model = SalOrder::model()->find('so_num=:so_num', array(':so_num' => $model->so_num));
                                $model->attributes = $_POST['SalOrder'];
                                $model->order_date = $this->dateConvert($_POST['SalOrder']['order_date']);
                                $model->delivery_schdate = $this->dateConvert($_POST['SalOrder']['delivery_schdate']);

                                $model->id_orgn = Yii::app()->user->orgn;
                                $model->id_branch = Yii::app()->user->branch;

                                $model->status = 1;
                                //update to Approved
                                if ($model->save())
                                    Yii::app()->user->setFlash('success', 'DO Approved, doc.number:' . $model->so_num);
                                break;
                            case "Release":
                                /*
                                 * Check credit limit, outstanding invoiced, dll.
                                 */
                                $model = SalOrder::model()->find('so_num=:so_num', array(':so_num' => $model->so_num));
                                $model->attributes = $_POST['SalOrder'];
                                $model->order_date = $this->dateConvert($_POST['SalOrder']['order_date']);
                                $model->delivery_schdate = $this->dateConvert($_POST['SalOrder']['delivery_schdate']);

                                $model->id_orgn = Yii::app()->user->orgn;
                                $model->id_branch = Yii::app()->user->branch;

                                $model->status = 2;
                                //Update to Released
                                if ($model->save())
                                    Yii::app()->user->setFlash('success', 'DO Released, doc.number:' . $model->so_num);
                                break;
                            case "Post (Create Invoice)":
                                /*
                                 * Check shipping first
                                 */
                                $model = SalOrder::model()->find('so_num=:so_num', array(':so_num' => $model->so_num));
                                $model->attributes = $_POST['SalOrder'];
                                $model->order_date = $this->dateConvert($_POST['SalOrder']['order_date']);
                                $model->delivery_schdate = $this->dateConvert($_POST['SalOrder']['delivery_schdate']);

                                $model->id_orgn = Yii::app()->user->orgn;
                                $model->id_branch = Yii::app()->user->branch;

                                if ($model->status < 3)
                                    Yii::app()->user->setFlash('error', 'doc.number:' . $model->so_num . ' belum terkirim..');
                                else {
                                    $model->status = 4;
                                    //Update to posting
                                    if ($model->save())
                                        Yii::app()->user->setFlash('success', 'DO Released, doc.number:' . $model->so_num);
                                }
                                break;
                            default :
                                Yii::app()->user->setFlash('error', 'doc.number:' . $model->so_num . ' failed while update..');
                        }
                    }
                    $conn->commit();
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
                if (isset($model->order_date))
                    $model->order_date = $this->dateRevert($model->order_date);
                if (isset($model->delivery_schdate))
                    $model->delivery_schdate = $this->dateRevert($model->delivery_schdate);
            }
        }

        $sql = "SELECT value FROM configure WHERE conf_name = 'so_status' AND trim(conf_code)='$model->status'";
        $command = Yii::app()->db->createCommand($sql);
        $val = $command->queryScalar();

        if (!$model->isNewRecord) {
            $mcust = Customers::model()->find('id_customer=:id_cust', array(':id_cust' => $model->id_customer));
            $cust['cd_cust'] = $mcust->cd_cust;
            $cust['nm_cust'] = $mcust->nm_cust;
        } else {
            $cust['cd_cust'] = '';
            $cust['nm_cust'] = '';
        }
        $this->render('salesOrder', array('model' => $model,
            'modeldtl' => $modeldtl,
            'modelinfo' => $modelinfo,
            'status_val' => $val,
            'cust' => $cust));
    }

    public function actionCustomerList() {
        $criteria = new CDbCriteria;
        $cust = new CActiveDataProvider('Customers', array(
                    'criteria' => $criteria,
                ));

        //$this->render('customerList',  array('cust'=>$cust), false, false);
        $tampil = $this->renderPartial('customerList', array('cust' => $cust), false, false);
        echo $tampil;
    }

    protected function setItem($mld, $val) {
        return $mdl;
    }

}