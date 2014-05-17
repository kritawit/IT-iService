<div class="panel">
    <?php echo $this->beginContent("/config/toolbar",array("current"=>4)); ?>
    <?php echo $this->endContent(); ?>
    <div class="panel_body">
        <fieldset>
            <legend>ข้อมูลประเภทวัสดุ/อุปกรณ์</legend>
            <?php  
            $form = $this->beginWidget('CActiveForm',array(
                'id'=>'DeviceType-form',
                'enableAjaxValidation'=>false
            ));
            ?>
            <div>
                <?php echo $form->labelEx($model,"device_type_name"); ?>
                <?php echo $form->textField($model,"device_type_name",array("size"=>50)); ?>
                <?php echo $form->error($model,"device_type_name"); ?>
            </div>
            <div>
                <label></label>
                <?php echo CHtml::submitButton("บันทึก"); ?>
            </div>
            <?php echo $form->hiddenField($model,"id"); ?>
            <?php $this->endWidget(); ?>
        </fieldset>
    </div>
</div>