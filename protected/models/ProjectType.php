<?php

class ProjectType extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return "project_types";
    }

    public function attributeLabels() {
        return array(
            "project_type_name" => "ชื่อประเภทโปรเจค"
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}