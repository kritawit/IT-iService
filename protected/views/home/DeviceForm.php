<div class="panel">
    <?php echo $this->beginContent("/home/toolbar", array("current" => 3)); ?>
    <?php echo $this->endContent(); ?>

    <div class="panel_body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'RepairType-form',
            'enableAjaxValidation' => false
                ));
        ?>
        <div>
            <?php echo $form->labelEx($model, "device_type_id"); ?>
            <?php echo $form->dropdownList($model, "device_type_id", DeviceType::getOptions()); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "device_name"); ?>
            <?php echo $form->textField($model, "device_name", array("size" => 80)); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "device_brand_name"); ?>
            <?php echo $form->textField($model, "device_brand_name"); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "device_code"); ?>
            <?php echo $form->textField($model, "device_code"); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "device_record_code"); ?>
            <?php echo $form->textField($model, "device_record_code"); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "device_price"); ?>
            <?php echo $form->textField($model, "device_price", array("size" => 5)); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "device_buy_date"); ?>
           <?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
             'model' => $model, // Your model
             'attribute' => 'device_buy_date', // Attribute for input
             )); ?>
            
        </div>
        <div>
            
             <?php echo $form->labelEx($model,'device_garantee_expire_date'); ?>
             <?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
             'model' => $model, // Your model
             'attribute' => 'device_garantee_expire_date',
             )); ?>
        </div>
        <div>
            <label></label>
            <?php echo $form->hiddenField($model, "id"); ?>
            <?php echo CHtml::submitButton("บันทึก"); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>