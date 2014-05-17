<div class="panel">
    <?php echo $this->beginContent("/home/toolbar",array("current"=>6)); ?>
    <?php echo $this->endContent();?>
    <div class="panel_body">
        <?php 
        $form= $this->beginWidget('CActiveForm',array(
            'id'=>'request-form',
            'enableAjaxValidation'=>false
        ));
        ?>
        <div>
            <?php echo $form->labelEx($model,"device_id"); ?>
            <?php echo $form->textField($model,"device_id",array(
               "disabled"=>"disabled",
                "size"=>100,
                "value"=>$model->device->device_brand_name
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"employee_id"); ?>
            <?php echo $form->textField($model,"employee_id",array(
                "disabled"=>"disabled",
                "size"=>100,
                "value"=>$model->employee->employee_fname." ".$model->employee->employee_lname
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"request_problem"); ?>
            <?php echo $form->textField($model,"request_problem",array(
               "disabled"=>"disabled",
                "size"=>150
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"request_detail"); ?>
            <?php echo $form->textField($model,"request_detail",array(
                "disabled"=>"disabled",
                "cols"=>150,
                "rows"=>5
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"request_created_date"); ?>
            <?php echo $form->textField($model,"request_created_date",array(
               "disabled"=>"disabled",
                "size"=>50
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"request_get_date"); ?>
            <?php echo $form->textField($model,"request_get_date",array(
               "disabled"=>"disabled",
                "size"=>50
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"request_start_repair_date"); ?>
            <?php echo $form->textField($model,"request_start_repair_date",array(
               "disabled"=>"disabled",
                "size"=>50
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"request_end_repair_date"); ?>
            <?php echo $form->textField($model,"request_end_repair_date",array(
               "disabled"=>"disabled",
                "size"=>50
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"request_answer"); ?>
            <?php echo $form->textArea($model,"request_answer",array(
               "disabled"=>"disabled",
                "cols"=>150,
                "rows"=>5
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"request_repair_detail_work"); ?>
            <?php echo $form->textArea($model,"request_repair_detail_work",array(
               "disabled"=>"disabled",
                "cols"=>150,
                "rows"=>5
            )); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model,"request_end_remark"); ?>
            <?php echo $form->textArea($model,"request_end_remark",array(
                "cols"=>150,
                "rows"=>5
            )); ?>
        </div>
        <div>
            <label></label>
            <?php echo CHtml::submitButton("ปิดงาน"); ?>
        </div>
        <?php echo $form->hiddenField($model,"id"); ?>
        <?php $this->endWidget(); ?>
    </div>
</div>
