<?php
ob_start(); session_start();

class HomeController extends Controller {
    
    function actionIndex() {
        $this->render("Index");
    }
    
    function actionRequestForm($id = null) {
        $model = new Request();
        
        if (!empty($_POST["Request"])) {
            $id = $_POST["Request"]["id"];
            
            if (!empty($id)) {
                $model = Request::model()->findByPk($id);
            }
            $model->_attributes = $_POST["Request"];
            
            if ($model->save()) {
                $this->redirect(array("RequestHistory"));
            }
        }
        
        if (!empty($id)) {
            $model = Request::model()->findByPk($id);
        }
        
        $this->render("RequestForm", array(
            "model" => $model
        ));
    }
    
    function actionRequestDelete($id) {
        Request::model()->deleteByPk($id);
        $this->redirect(array("RequestHistory"));
    }
    
    /*
     * TODO: RequestHistory
     */
    function actionRequestHistory() {
        $model = new Request();
        $this->render("RequestHistory", array(
            "model" => $model
        ));
    }
    
    function actionRequestHistoryForm($id) {
        $model = Request::model()->findByPk($id);
        $this->render("RequestHistoryForm", array(
            "model" => $model
        ));
    }

   function actionDeviceForm($id = null) {
        // object for use
        $kdate = new KDate();
        $model = new Device();
        
        // save
        if (!empty($_POST["Device"])) {
            $id = $_POST["Device"]["id"];
            $buy_date = $_POST["Device"]["device_buy_date"];
            $garantee_expire_date = $_POST["Device"]["device_garantee_expire_date"];
            
            if (!empty($id)) {
                $model = Device::model()->findByPk($id);
            }
            
            $model->attributes = $_POST["Device"];           
            $model->device_buy_date =$kdate->convertMysqlToThaiDate($model->device_buy_date);
            $model->device_garantee_expire_date =$kdate->convertMysqlToThaiDate($model->device_garantee_expire_date);
            if ($model->save()) {
                $this->redirect(array("DeviceList"));
            }
        }

        // render
       
        /*if (!empty($id)) {        
            $model = Device::model()->findByPk($id);
            $model->device_buy_date = date('Y-m-d');;
            $model->device_garantee_expire_date = date('Y-m-d');;
        }*/
        $model->device_buy_date = $kdate->getNowThai();
        $model->device_garantee_expire_date = $kdate->getNowAddYearThai(1);
        if(isset($id)){
            $model = Device::model()->findByPk($id);
            $model->device_buy_date =$kdate->convertMysqlToThaiDate($model->device_buy_date);
            $model->device_garantee_expire_date =$kdate->convertMysqlToThaiDate($model->device_garantee_expire_date);
        }
        $this->render("DeviceForm", array(
            "model" => $model
        ));
    }
    function actionDeviceFormUpdate($id=null){
        
        $model = new Device();        
		if(!empty($_POST)){
                    $id = $_POST["Device"]["id"];
                    if(!empty($id)){
                        $model = Device::model()->findByPk($id);
                    }
                    $model->_attributes = $_POST["Device"];
                    $model->device_buy_date = ('00 00 0000');
                    $model->device_garantee_expire_date = ('00 00 0000');
                    if($model->save()){
                        $this->redirect(array("DeviceList"));
                    }
                }
                if(!empty($id)){
                    $model = Device::model()->findByPk($id);
                }
                $this->render("DeviceFormUpdate",array(
                   "model"=>$model 
                ));
    }
            function actionDeviceList() {
        $model = new Device();
        $this->render("DeviceList", array(
           "model" => $model 
        ));
    }
    
    function actionDeviceDelete($id) {
        Device::model()->deleteByPk($id);
        $this->redirect(array("DeviceList"));
    }
    
    /*
     * TODO: RequestGetRequest
     */
    function actionRequestGetRequest() {
        $model = new Request();
        $this->render("RequestGetRequest", array(
            "model" => $model
        ));
    }
    
    function actionRequestGetRequestForm($id = null) {
        // save
        if (!empty($_POST)) {
            $model = Request::model()->findByPk($_POST["Request"]["id"]);
            $model->request_get_date = new CDbExpression("NOW()");
            $model->engineer_id = $_POST["Request"]["engineer_id"];
            $model->request_status = "get";
            
            if ($model->save()) {
                $this->redirect(array("RequestGetRequest"));
            }
        }
        
        // form
        $model = Request::model()->findByPk($id);
        $this->render("RequestGetRequestForm", array(
            "model" => $model
        ));
    }
    
    /*
     * TODO: RequestGetRepair
     */
    function actionRequestGetRepair() {
        $model = new Request();
        $this->render("RequestGetRepair", array(
            "model" => $model
        ));
    }
    
    function actionRequestGetRepairForm($id) {
       
//        if(!isset($_POST['Request'])){
//            print_r($_POST['Request']);
//        }

        
        // save
        if (!empty($_POST)) {
            $model = Request::model()->findByPk($_POST["Request"]["id"]);
            
            // get repair
            if ($model->request_status != "repair") {
                $model->request_start_repair_date = new CDbExpression("NOW()");
                $model->request_status = "repair";
            }else if($model->request_status = "repair_end"){
            $model->request_repair_detail_work = $_POST["Request"]["request_repair_detail_work"];
            }
            // do repair
            //echo $_POST['request_repair_detail_work'];
//            $model->request_repair_detail_work = $_POST["request_repair_detail_work"];
//            $model->request_answer = $_POST["request_answer"];
            
            // do clame
            if (!empty($_POST["clame"])) {
                $model->request_clame_date = new CDbExpression("NOW()");
                $model->request_clame_remark = $_POST["Request"]["request_clame_remark"];
            }
            
            // end repair
            if (!empty($_POST["request_status"])) {
                $model->request_end_repair_date = new CDbExpression("NOW()");
                $model->request_status = $_POST["request_status"];
            }
            
            // save
            if ($model->save()) {
                $this->redirect(array("RequestGetRepair"));
            }
        }
        
        
        // show
        $model = Request::model()->findByPk($id);
        $this->render("RequestGetRepairForm", array(
            "model" => $model
        ));
    }
    
    /*
     * TODO: RequestRepairEnd
     */
    function actionRequestRepairEnd() {
        $model = new Request();
        $this->render("RequestRepairEnd", array(
            "model" => $model
        ));
    }
    
    function actionRequestRepairEndForm($id) {
        // save
        if (!empty($_POST)) {
            $model = Request::model()->findByPk($_POST["Request"]["id"]);
            $model->request_close_date = new CDbExpression("NOW()");
            $model->request_end_remark = $_POST["Request"]["request_end_remark"];
            $model->request_status = "close";
            
            if ($model->save()) {
                $this->redirect(array("RequestRepairEnd"));
            }
        }

        // show
        $model = Request::model()->findByPk($id);
        $this->render("RequestRepairEndForm", array(
            "model" => $model
        ));
    }
    
}