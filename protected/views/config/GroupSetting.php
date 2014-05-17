<script type="text/javascript">
    // create new group
    function addGroup(parent_id, parent_name) {
        // กำหนด dialogGroup ให้แสดงผลแบบ inline
        $("#dialogGroup").css("display", "inline-block");
        
        // กำหนดให้เป็นแบบ window
        $("#dialogGroup").window({
            modal: true,    // แสดงผลแบบ modal
            width: 650,     // กว้าง 650px
            height: 150,    // สูง 150px
            shadow: false,  // ไม่แสดงเงา
            title: "บันทึกข้อมูล โครงสร้างองค์กร ภายใต้กลุ่ม: " + parent_name
        });
        
        // เคลียร์ค่าของ Group_group_name
        $("#Group_group_name").val("");
        
        // กำหนดค่า parent_id ไว้ใน Group_group_id
        $("#Group_group_id").val(parent_id);
    }
    
    // edit group
    function editGroup(id, parent_id, parent_name) {
        // กำหนดให้ dialogGroup แสดงผลแบบ inline-block
        $("#dialogGroup").css("display", "inline-block");
        
        // กำหนดให้ dialogGroup แสดงแบบหน้าต่าง
        $("#dialogGroup").window({
            modal: true,    // ให้แสดงผลแบบ modal
            width: 650,     // กว้าง 650px
            height: 150,    // สูง 150px
            shadow: false,  // ไม่แสดงเงา
            title: "บันทึกข้อมูล โครงสร้างองค์กร ภายใต้กลุ่ม: " + parent_name
        });
        
        // ดึงข้อมูลมาแสดงผลแบบ ajax
        $.ajax({
            // ไปดึงมาจาก GroupJson
            url: "<?php echo $this->createUrl("GroupJson"); ?>",
            dataType: "json",   // กำหนดรูปแบบข้อมูลที่ดึงมาเป็นแบบ json
            cache: false,       // ไม่ให้จำค่าเดิม
            data: {id: id},     // ข้อมูลที่ส่งไปคือ id
            
            // เมื่อดึงข้อมูลมาแล้ว
            success: function(data) {
                // กำหนดชื่อลงในช่อง Group_group_name
                $("#Group_group_name").val(data.group_name);
            }
        });
        
        // กำหนดค่าใน Group_id = id
        $("#Group_id").val(id);
        
        // กำหนดค่าใน Group_group_id = parent_id
        $("#Group_group_id").val(parent_id);
    }
</script>

<div class="panel">
    <?php echo $this->beginContent("/config/toolbar", array("current" => 1)); ?>
    <?php echo $this->endContent(); ?>

    <div class="panel_body">
        <!-- button new group -->
        <div>
            <a href="#" 
               onclick="return addGroup(0)" 
               class="ui-icon ui-icon-plus ui-state-default ui-corner-all ui-state-hover" 
               style="display: inline-block;">
            </a>
        </div>

        <?php
        foreach ($groups as $r) {
            $url = Yii::app()->request->baseUrl . "/index.php?r=Config/GroupDelete&id={$r->id}";
            $html = "
                <div class='row'>
                    <span>{$r->group_name}</span>
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
            echo $html;
            echo $group->listData(1, $r->id);
        }
        ?>
    </div>
</div>

<!-- Form -->
<div id="dialogGroup" style="display: none; padding: 10px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'GroupSetting-form',
        'enableAjaxValidation' => false
            ));
    ?>
    <div>    
        <?php echo $form->labelEx($group, "group_name"); ?>
        <?php echo $form->textField($group, "group_name", array("size" => 80)); ?>
        <?php echo $form->error($group, "group_name"); ?>
    </div>
    <div>
        <label></label>
        <?php echo CHtml::submitButton("บันทึก"); ?>
    </div>
    <?php echo $form->hiddenField($group, "id"); ?>
    <?php echo $form->hiddenField($group, "group_id"); ?>
    <?php $this->endWidget(); ?>
</div>