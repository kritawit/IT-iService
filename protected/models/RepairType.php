<?php

class RepairType extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return "repair_types";
    }

    public function attributeLabels() {
        return array(
            "repair_type_name" => "ชื่อประเภท"
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}

