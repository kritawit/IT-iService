<?php

// สร้าง class Group สืบทอดมาจาก CActiveRecord
class Group extends CActiveRecord {

    // สร้าง function model เอาไว้ใช้สร้าง object
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    // กำหนดให้เชื่อมกับตารางชื่อ groups
    public function tableName() {
        return "groups";
    }

    // ผูกฟิลด์ต่าง ๆ เข้ากับ label เวลาแสดงผลบนจอ
    public function attributeLabels() {
        return array(
            "group_name" => "ชื่อกลุ่ม",
            "group_id" => "อยู่ภายใต้",
            "group_created_date" => "วันที่บันทึก"
        );
    }

    // กำหนดเงื่อนไขเมื่อทำการบันทึกรายการ
    public function beforeValidate() {
        // หากเป็นรายการใหม่
        if ($this->isNewRecord) {
            // บันทึกวันที่สร้างรายการเก็บไว้ โดยใช้ NOW() เพื่ออ่านค่าปัจจุบัน
            $this->group_created_date = new CDbExpression("NOW()");
        }

        // return
        return parent::beforeValidate();
    }

    // แสดงข้อมูลออกมาในแบบของ Tree Data
    public function listData($level = 1, $group_id = null) {
        // ค้นหา groups โดยกำหนดเงื่อนไขให้ดึงเฉพาะ group_id
        $attributes = array();
        $attributes["group_id"] = $group_id;
        $groups = Group::model()->findAllByAttributes($attributes);
        
        // render HTML Code
        $html = "";

        // ถ้ามี items ย่อยใน $groups
        if (count($groups) > 0) {
            foreach ($groups as $r) {
                // เก็บค่า path ลงใน $url
                $url = Yii::app()->request->baseUrl . "/index.php?r=Config/GroupDelete&id={$r->id}";

                // เริ่มต่อ <div> เข้าในตัวแปร $html
                $html .= "<div class='row'>";
                $html .= "<span>";
                
                // add space
                for ($i = 1; $i <= $level; $i++) {
                    $html .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                
                // แสดงรายการตัวเลือกต่าง ๆ ออกมาทีละแถว พร้อมด้วยปุ่มกดเพื่อ add, edit, delete
                $html .= "
                    [-] {$r->group_name}</span>
                    <a href='#' 
                       onclick=\"return addGroup({$r->id}, '{$r->group_name}')\" 
                       class='ui-icon ui-icon-plus ui-state-default ui-corner-all ui-state-hover' 
                       style='display: inline-block;'>
                    </a>
                    <a href='#' 
                       onclick=\"return editGroup({$r->id}, {$r->id}, '{$r->group_name}')\" 
                       class='ui-icon ui-icon-pencil ui-state-default ui-corner-all ui-state-hover' 
                       style='display: inline-block'>
                    </a>
                    <a href='{$url}' 
                       onclick=\"return confirm('ยืนยันการลบ {$r->group_name}')\" 
                       class='ui-icon ui-icon-close ui-state-default ui-corner-all ui-state-hover' 
                       style='display: inline-block;'>
                    </a>
                </div>";
                
                // recursive function
                $html .= $this->listData($level + 1, $r->id);
            }
        }

        // return html output
        return $html;
    }
    
    public static function getOptionChilds($name, $level = 1, $group_id = 0, $default_value = null) {
        // สร้าง HTML Output
        $html = "<ul>";
        
        // ค้นหา groups โดยระบุเงื่อนไขเป็น group_id
        $attributes = array();
        $attributes["group_id"] = $group_id;        
        $model = Group::model()->findAllByAttributes($attributes);
        
        // loop เพื่อต่อ li เข้าไปเรื่อย ๆ
        foreach ($model as $r) {
            $checked = "";
            if ($r->id == $default_value) {
                $checked = "checked";
            }
            
            $html .= "<li><input type='radio' name='$name' value='{$r->id}' $checked />";
            $html .= "{$r->group_name}";
            $html .= "</li>";
            $html .= Group::getOptionChilds($name, $level + 1, $r->id, $default_value);
        }
        $html .= "</ul>";        
        return $html;
    }
    
    public static function getOptions($name, $default_value = null) {
        // สร้าง HTML Output
        $html = "";
        $html .= "<ul class='list'>";
        
        // ค้นหา group โดยระบุ group_id = 0
        $attributes = array();
        $attributes["group_id"] = 0;        
        $model = Group::model()->findAllByAttributes($attributes);
        
        // loop เพื่อต่อ li เข้าไปเรื่อย ๆ
        foreach ($model as $r) {   
            $html .= "<li><input type='radio' name='$name' value='{$r->id}' />"; 
            $html .= "{$r->group_name}";
            $html .= "</li>";
            $html .= Group::getOptionChilds($name, 1, $r->id, $default_value);
        }
        $html .= "</ul>";
        
        // return HTML Output
        return $html;
    }

}