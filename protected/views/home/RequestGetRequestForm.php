<div class="panel">
    <?php echo $this->beginContent("/home/toolbar",array("current"=>4)); ?>
    <?php echo $this->endContent();?>
    <div class="panel_body">
        <?php 
        $form = $this->beginWidget('CActiveForm',array(
            'id'=>'request-form',
            'enableAjaxValidation'=>false
        ));
        ?>
        <div>
            <?php echo $form->labelEx($model, "device_id"); ?>
            <?php echo $form->textField($model, "device_id",array(
                "disabled"=>"disabled",
                "size"=>100,
                "value"=>$model->device->device_brand_name." ".$model->device->device_name
            ));?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "employee_id"); ?>
            <?php echo $form->textField($model, "employee_id",array(
                "disabled"=>"disabled",
                "size"=>100,
                "value"=>$model->device->device_brand_name." ".$model->device->device_name
            ));?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "request_problem"); ?>
            <?php echo $form->textField($model, "request_problem",array(
                "disabled"=>"disabled",
                "size"=>150,
            ));?>
        </div>        
        <div>
            <?php echo $form->labelEx($model, "request_detail"); ?>
            <?php echo $form->textArea($model, "request_detail",array(
                "disabled"=>"disabled",
                "size"=>150,
                "rows"=>5
            ));?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "request_created_date"); ?>
            <?php echo $form->textField($model, "request_created_date",array(
                "disabled"=>"disabled",
                "size"=>50,
            ));?>
        </div> 
        <div>
            <?php echo $form->labelEx($model, "request_get_date"); ?>
            <?php echo $form->textField($model, "request_get_date",array(
                "disabled"=>"disabled",
                "size"=>50,
            ));?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"engineer_id"); ?>
            <?php echo $form->dropdownList($model,"engineer_id",  Employee::getOptions()); ?>
        </div>
        <div>
            <label></label>
            <?php echo CHtml::submitButton("บันทึก"); ?>
        </div>
        <?php echo $form->hiddenField($model,"id"); ?>
        <?php $this->endWidget(); ?>
    </div>
</div>