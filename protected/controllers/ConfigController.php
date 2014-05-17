<?php
class ConfigController extends Controller {
    
    public function actionIndex() {
        $this->render("index");
    }
    
    public function actionGroupSetting() {
        // ถ้ามีการส่งข้อมูลมา
        if (!empty($_POST["Group"])) {
            
            // ถ้าค่า id เป็นค่าว่าง ถือว่าเป็นการเพิ่มรายการใหม่
            if (empty($_POST["Group"]["id"])) {
                
                // สร้าง object ใหม่โดยการ new
                $group = new Group();
            } else {
                // เก็บค่า id ลงในตัวแปร $id
                $id = $_POST["Group"]["id"];
                
                // ค้นหาโดยรหัส PK
                $group = Group::model()->findByPk($id);
            }
            
            // เก็บค่าลงใน attributes ของ Group
            $group->_attributes = $_POST["Group"];
            
            // บันทึกรายการ
            if ($group->save()) {
                
                // redirect ไปยังหน้า GroupSetting
                $this->redirect(array("GroupSetting"));
            }
        }
        
        // ค้นหาโดยค้นจาก group_id = 0
        $attributes = array();
        $attributes["group_id"] = 0;
        $groups = Group::model()->findAllByAttributes($attributes);
        
        // สร้าง object group มาใหม่โดยการ new
        $group = new Group();
        
        // render ไปที่ view GroupSetting 
        // และส่วตัวแปรไปสองตัวคือ group, groups
        $this->render("GroupSetting", array(
            "group" => $group,
            "groups" => $groups
        ));
    }
    
    // สร้าง function ในการลบ Group ให้รับค่า $id เข้ามา
    function actionGroupDelete($id) {
        
        // สร้าง $group โดยค้นจาก PK
        $group = Group::model()->findByPk($id);
        
        // ทำการลบ
        if ($group->delete()) {
            
            // redirect ไปยังหน้า GroupSetting
            $this->redirect(array("GroupSetting"));
        }
    }
    
    // ดึงข้อมูลออกมาเป็นแบบ Json ให้รับค่า $id เข้ามา
    function actionGroupJson($id) {
        
        // สร้าง object $group โดยค้นจาก PK
        $group = Group::model()->findByPk($id);
        
        // เข้ารหัสข้อมูลที่ดึงมาได้ ให้เป็นรูปแบบ JSON Format
        echo CJSON::encode($group);
    }
    
    // หน้าหลักประเภทงานซ่อม
    function actionRepairType() {    
        
        // สร้าง object ของ RepairType ตั้งชื่อว่า $model
        $model = new RepairType();
        
        // render และทำการส่ง object ตั้งชื่อว่า model ไปด้วย
        $this->render("RepairType", array(
            "model" => $model
        ));
    }
    
    // Form ในการเพิ่มรายการ และแก้ไขรายการ
    function actionRepairTypeForm($id = null) {
        // หากมีการส่งข้อมูลมา
        if (!empty($_POST["RepairType"])) {
            
            // สร้าง object $repairType จาก model RepairType
            $repairType = new RepairType();
            
            // เก็บค่า $id ไว้ในตัวแปร (กรณีทำการแก้ไขรายการ)
            $id = $_POST["RepairType"]["id"];
            
            // ถ้า $id ไม่ใช่ค่าว่าง แสดงว่าทำการแก้ไข
            if (!empty($id)) {
                // ให้ไปค้นหาจาก PK ของ RepairType
                $repairType = RepairType::model()->findByPk($id);
            }
            
            // กำหนดค่าต่าง ๆ ให้กับ $repairType
            $repairType->_attributes = $_POST["RepairType"];
            
            // ทำการบันทึกข้อมูล
            if ($repairType->save()) {
                
                // ไปยังหน้า RepairType
                $this->redirect(array("RepairType"));
            }
        }
        
        // สร้าง object ของ RepairType ให้ชื่อว่า $model
        $model = new RepairType();
        
        // ถ้ามีการส่ง id เข้ามา แสดงว่าทำการแก้ไข
        if (!empty($id)) {
            
            // ทำการค้นหาจาก PK ของ RepairType
            $model = RepairType::model()->findByPk($id);
        }
        
        // render และส่งค่าตัวแปร $model ไปด้วย
        $this->render("RepairTypeForm", array(
            "model" => $model
        ));
    }
    
    // ลบรายการ โดยรับค่า $id เข้ามา
    function actionRepairTypeDelete($id) {
        
        // ทำการลบรายการตามรหัสที่ส่งเข้ามา
        RepairType::model()->deleteByPk($id);
        
        // ไปยังหน้า RepairType
        $this->redirect(array("RepairType"));
    }
    
    function actionProjectType() {
        $model = new ProjectType();
        $this->render("ProjectType", array(
            "model" => $model
        ));
    }
    
    function actionProjectTypeForm($id = null) {
        // Save
        if (!empty($_POST["ProjectType"])) {
            $model = new ProjectType();
            $id = $_POST["ProjectType"]["id"];
            
            if (!empty($id)) {
                $model = ProjectType::model()->findByPk($id);
            }
            $model->_attributes = $_POST["ProjectType"];
            
            if ($model->save()) {
                $this->redirect(array("ProjectType"));
            }
        }
        
        // Render
        $model = new ProjectType();
        
        if (!empty($id)) {
            $model = ProjectType::model()->findByPk($id);
        }
        
        $this->render("ProjectTypeForm", array(
            "model" => $model
        ));
    }
    
    function actionProjectTypeDelete($id) {
        ProjectType::model()->deleteByPk($id);
        $this->redirect(array("ProjectType"));
    }
    
    function actionDeviceType() {
        $model = new DeviceType();
        $this->render("DeviceType", array(
            "model" => $model
        ));
    }
    
    function actionDeviceTypeForm($id = null) {
        // Save
        if (!empty($_POST["DeviceType"])) {
            $model = new DeviceType();
            $id = $_POST["DeviceType"]["id"];
            
            if (!empty($id)) {
                $model = DeviceType::model()->findByPk($id);
            }
            
            $model->_attributes = $_POST["DeviceType"];
            
            if ($model->save()) {
                $this->redirect(array("DeviceType"));
            }
        }
        
        // Render
        $model = new DeviceType();
        
        if (!empty($id)) {
            $model = DeviceType::model()->findByPk($id);
        }
        
        $this->render("DeviceTypeForm", array(
            "model" => $model
        ));
    }
    
    function actionDeviceTypeDelete($id) {
        DeviceType::model()->deleteByPk($id);
        $this->redirect(array("DeviceType"));
    }
    
    function actionEmployee() {
        $model = new Employee();
        $this->render("Employee", array(
            "model" => $model
        ));
    }
    
    function actionEmployeeDelete($id) {
        Employee::model()->deleteByPk($id);
        $this->redirect(array("Config/Employee"));
    }
    
    function actionEmployeeView($id) {
        $model = Employee::model()->findByPk($id);
        $this->render("EmployeeView", array(
            "model" => $model
        ));
    }
}
