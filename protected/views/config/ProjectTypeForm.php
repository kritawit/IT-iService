<div class="panel">
    <?php echo $this->beginContent("/config/toolbar",array("current"=>3)); ?>
    <?php echo $this->endContent();?>
    <div class="panel_body">
        <fieldset>
            <legend>ข้อมูลประเภทงานโปรเจค</legend>
            <?php 
            $form = $this->beginWidget('CActiveForm',array(
                'id'=>'ProjectType-form',
                'enableAjaxValidation'=>false
            ));
            ?>
            <div>
                <?php echo $form->labelEx($model,"project_type_name"); ?>
                <?php echo $form->textField($model,"project_type_name",array("size"=>50)); ?>
                <?php echo $form->error($model,"project_type_name"); ?>
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