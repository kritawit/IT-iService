<?php

class Employee extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return "employees";
    }

    public function attributeLabels() {
        return array(
            "employee_sex" => "เพศ",
            "employee_fname" => "ชื่อ",
            "employee_lname" => "นามสกุล",
            "employee_username" => "Username",
            "employee_password" => "Password",
            "employee_code" => "รหัสผู้ใช้งาน",
            "employee_level" => "ระดับ",
            "employee_email" => "Email",
            "employee_tel" => "เบอร์โทร",
            "employee_image" => "ภาพประจำตัว",
            "employee_created_date" => "วันที่สมัคร",
            "employee_status" => "สถานะ",
            "group_id" => "กลุ่ม"
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function relations() {
        return array(
            "group" => array(self::BELONGS_TO, "Group", "group_id")
        );
    }

    public function beforeValidate() {
        if ($this->isNewRecord) {
            $this->employee_status = "active";
            $this->employee_created_date = new CDbExpression("NOW()");
            $this->employee_level = "user";
        }

        return parent::beforeValidate();
    }

    public static function getOptions() {
        $model = Employee::model()->findAll();
        $arr = array();

        foreach ($model as $r) {
            $arr[$r->id] = $r->employee_fname . " " . $r->employee_lname;
        }
        return $arr;
    }

    public static function getSexName($sex) {
        if (!empty($sex)) {
            $arr = array(
                "f" => "หญิง",
                "m" => "ชาย"
            );
            return $arr[$sex];
        }
        return "";
    }

}