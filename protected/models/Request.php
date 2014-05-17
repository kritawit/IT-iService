<?php

class Request extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return "requests";
    }

    public function rules() {
        return array(
            array("request_problem, request_detail", "required"),
            array("request_problem", "length", "max" => 1000)
        );
    }

    public function attributeLabels() {
        return array(
            "employee_id" => "ผู้แจ้งซ่อม",
            "device_id" => "อุปกรณ์",
            "request_problem" => "ปัญหา/อาการ",
            "request_detail" => "รายละเอียด",
            "request_created_date" => "วันที่แจ้ง",
            "request_start_repair_date" => "วันที่เริ่มซ่อม",
            "request_end_repair_date" => "วันที่ซ่อมเสร็จ",
            "request_get_date" => "วันที่รับเรื่อง",
            "request_clame_date" => "วันที่ส่งเคลม",
            "request_close_date" => "วันที่ปิดงาน",
            "engineer_id" => "ผู้ซ่อม",
            "requester_id" => "ผู้รับเรื่อง",
            "closer_id" => "ผู้ปิดงาน",
            "request_repair_detail_work" => "รายละเอียดการซ่อม",
            "request_answer" => "สาเหตุอาการเสีย",
            "request_remark" => "หมายเหตุ",
            "request_status" => "สถานะ",
            "request_end_remark" => "หมายเหตุ",
            "request_clame_remark" => "หมายเหตุการเคลม"
        );
    }

    public function relations() {
        return array(
            "device" => array(self::BELONGS_TO, "Device", "device_id"),
            "employee" => array(self::BELONGS_TO, "Employee", "employee_id")
        );
    }

    public function search() {
        $criteria = new CDbCriteria();
        return new CActiveDataProvider($this, array(
                    "criteria" => $criteria
                ));
    }

    public function searchRequest() {
        $criteria = new CDbCriteria();
        $criteria->condition = "request_start_repair_date = '0000-00-00 00:00:00'";

        return new CActiveDataProvider($this, array(
                    "criteria" => $criteria
                ));
    }

    public function searchGetRepair() {
        $criteria = new CDbCriteria();
        $criteria->condition = "request_status IN ('get', 'repair','forward')";

        return new CActiveDataProvider($this, array(
                    "criteria" => $criteria
                ));
    }

    public function searchRepairEnd() {
        $condition = "
            request_end_repair_date != '0000-00-00 00:00:00'
            AND request_close_date = '0000-00-00 00:00:00'
        ";
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;

        return new CActiveDataProvider($this, array(
                    "criteria" => $criteria
                ));
    }

    public function searchMyHistory() {
        
        $employee_id = Yii::app()->session["employee_id"];
        $condition = "employee_id = '$employee_id' AND request_status != 'close'";
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function searchMyHistoryComplete() {
        $employee_id = Yii::app()->session["employee_id"];
        $condition = "
            employee_id = '$employee_id'
            AND request_status = 'close'
        ";
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;

        return new CActiveDataProvider($this, array(
                    "criteria" => $criteria
                ));
    }

    public function beforeValidate() {
        if ($this->isNewRecord) {
            $this->request_created_date = new CDbExpression("NOW()");
            $this->request_status = "wait";
            $this->employee_id = Yii::app()->session["employee_id"];
        }

        return parent::beforeValidate();
    }

    public function getButtonEditRequest($data, $row) {
        if ($data->request_status != "wait") {
            return "";
        } else {
            $img = CHtml::image("images/edit.png");
            return CHtml::link($img, array("Home/RequestForm", "id" => $data->id));
        }
    }

    public function getButtonDeleteRequest($data, $row) {
        if ($data->request_status != "wait") {
            return "";
        } else {
            $img = CHtml::image("images/delete.png");
            return CHtml::link($img, array("Home/RequestDelete", "id" => $data->id));
        }
    }

    public function getRequestStatus($data, $row) {
        switch ($data->request_status) {
            case "wait":
                return "ยังไม่รับเรื่อง";
            case "get":
                return "รับเรื่องแล้ว";
            case "repair":
                return "รับซ่อมแล้ว";
            case "repair_end":
                return "ซ่อมเสร็จแล้ว";
            case "close":
                return "ปิดงานแล้ว";
            case  "forward":
                return "ส่งเคลม";
        }
    }

    public function searchRepair($year, $month) {
        $criteria = new CDbCriteria();
        $criteria->addCondition("YEAR(request_created_date) = $year");
        $criteria->addCondition("MONTH(request_created_date) = $month");

        return new CActiveDataProvider($this, array(
            "criteria" => $criteria,
            "pagination" => false
        ));
    }
 
    public function countRequest($month, $year) {
        $criteria = new CDbCriteria();
        $criteria->addCondition("YEAR(request_created_date) = $year");
        $criteria->addCondition("MONTH(request_created_date) = $month");
        
        return $this->count($criteria);
    }
    
    public function countRepair($month, $year) {
        $criteria = new CDbCriteria();
        $criteria->addCondition("YEAR(request_created_date) = $year");
        $criteria->addCondition("MONTH(request_created_date) = $month");
        $criteria->addCondition("request_status IN ('get', 'repair', 'clame', 'forward')");
        
        return $this->count($criteria);
    }
    
    public function countRepairComplete($month, $year) {
        $criteria = new CDbCriteria();
        $criteria->addCondition("YEAR(request_created_date) = $year");
        $criteria->addCondition("MONTH(request_created_date) = $month");
        $criteria->addCondition("request_status IN ('repair_end')");
        
        return $this->count($criteria);
    }
    
    public function countComplete($month, $year) {
        $criteria = new CDbCriteria();
        $criteria->addCondition("YEAR(request_created_date) = $year");
        $criteria->addCondition("MONTH(request_created_date) = $month");
        $criteria->addCondition("request_status IN ('close')");
        
        return $this->count($criteria);
    }
    
    public function countWait($month, $year) {
        $criteria = new CDbCriteria();
        $criteria->addCondition("YEAR(request_created_date) = $year");
        $criteria->addCondition("MONTH(request_created_date) = $month");
        $criteria->addCondition("request_status NOT IN ('close')");
        
        return $this->count($criteria);
    }
    
    public function getButtonView($data, $row) {
        $param = array("Home/RequestHistoryForm", "id" => $data->id);
        $link = CHtml::link($data->device->device_code, $param);
        
        return $link;
    }
    
    public function getButtonGetRequestView($data, $row) {
        $param = array("Home/RequestGetRequestForm", "id" => $data->id);
        $link = CHtml::link($data->device->device_code, $param);
        
        return $link;
    }
    
    public function getButtonGetRepairView($data, $row) {
        $param = array("Home/RequestGetRepairForm", "id" => $data->id);
        $link = CHtml::link($data->device->device_code, $param);
        
        return $link;
    }
    public function getButtonRepairEndView($data, $row) {
        $param = array("Home/RequestRepairEndForm", "id" => $data->id);
        $link = CHtml::link($data->device->device_code, $param);
        
        return $link;
    }    
}