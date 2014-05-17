<div class="panel">
    <?php echo $this->beginContent("/config/toolbar",array("current"=>2)); ?>
    <?php echo $this->endContent();?>
    
    <div class="panel_body">
        <fieldset>
            <legend>ข้อมูลประเภทงานซ่อม</legend>
            <?php
            $form = $this->beginWidget('CActiveForm',array(
                'id'=>'RepairType-form',
                'enableAjaxValidation'=>false
            ));
            ?>
            <div>
                <?php echo $form->labelEx($model,"repair_type_name"); ?>
                <?php echo $form->textField($model, "repair_type_name",array("size"=>50)); ?>
                <?php echo $form->error($model,"repair_type_name"); ?>
            </div>
            <div>
                <label></label>
                <?php echo CHtml::submitButton("บันทึก"); ?>
            </div>
            <?php echo $form->hiddenField($model,"id"); ?>
            <?php $this->endWidget();?>
        </fieldset>
    </div>
</div>