<div class="panel">
    <?php echo $this->beginContent("/home/toolbar", array("current" => 5)); ?>
    <?php echo $this->endContent(); ?>

    <div class="panel_body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'request-form',
            'enableAjaxValidation' => false
                ));
        ?>
        <div>
            <?php echo $form->labelEx($model, "device.device_code"); ?>
            <?php echo $form->textField($model, "device_id", array(
                "disabled" => "disabled",
                "size" => 50,
                "value" => $model->device->device_code
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "device_id"); ?>
            <?php echo $form->textField($model, "device_id", array(
                "disabled" => "disabled",
                "size" => 100,
                "value" => $model->device->device_brand_name." ".$model->device->device_name
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "employee_id"); ?>
            <?php echo $form->textField($model, "employee_id", array(
                "disabled" => "disabled",
                "size" => 100,
                "value" => $model->employee->employee_fname." ".$model->employee->employee_lname
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "request_problem"); ?>
            <?php echo $form->textField($model, "request_problem", array(
                "disabled" => "disabled",
                "size" => 150
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "request_detail"); ?>
            <?php echo $form->textArea($model, "request_detail", array(
                "disabled" => "disabled",
                "cols" => 150,
                "rows" => 5
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "request_created_date"); ?>
            <?php echo $form->textField($model, "request_created_date", array(
                "disabled" => "disabled",
                "size" => 50
            )); ?>
            <?php echo $form->labelEx($model, "request_get_date"); ?>
            <?php echo $form->textField($model, "request_get_date", array(
                "disabled" => "disabled",
                "size" => 50
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "device.device_buy_date"); ?>
            <?php echo $form->textField($model, "device_id", array(
                "disabled" => "disabled",
                "size" => 50,
                "value" => $model->device->device_buy_date
            )); ?>
            <?php echo $form->labelEx($model, "device.device_garantee_expire_date"); ?>
            <?php echo $form->textField($model, "device_id", array(
                "disabled" => "disabled",
                "size" => 50,
                "value" => $model->device->device_garantee_expire_date
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "request_start_repair_date"); ?>
            <?php echo $form->textField($model, "request_start_repair_date", array(
                "disabled" => "disabled",
                "size" => 50
            )); ?>
        </div>
        <?php if ($model->request_status == "get"): ?>
            <div>
                <label></label>
                <?php echo CHtml::submitButton("รับซ่อมรายการนี้"); ?>
            </div>
        <?php else: ?>
            <div>
                <?php echo $form->labelEx($model, "request_answer"); ?>
                <?php echo $form->textArea($model, "request_answer", array(
//                    "disabled" => "disabled",
                    "cols" => 150,
                    "rows" => 5
                )); ?>
            </div>
            <div>
                <?php echo $form->labelEx($model, "request_repair_detail_work"); ?>
                <?php echo $form->textArea($model, "request_repair_detail_work", array(
//                    "disabled" => "disabled",
                    "cols" => 150, 
                    "rows" => 5
                )); ?>
            </div>
            <div>
                <label>ส่งเคลม</label>
                <?php echo CHtml::checkBox("clame", $model->request_clame_date != "0000-00-00 00:00:00"); ?>
                <?php echo $form->labelEx($model, "request_clame_remark"); ?>
                <?php echo $form->textField($model, "request_clame_remark", array(
//                    "disabled" => "disabled",
                    "size" => 120
                )); ?>
            </div>
            <div>
                <?php echo $form->labelEx($model, "request_status"); ?>
                <input type="checkbox" name="request_status" value="repair_end" /> ซ่อมเสร็จแล้ว
            </div>
            <div>
                <label></label>
                <?php echo CHtml::submitButton("บันทึกรายการ"); ?>
            </div>
        <?php endif ?>
        <?php echo $form->hiddenField($model, "id"); ?>
        <?php $this->endWidget(); ?>
    </div>
</div>