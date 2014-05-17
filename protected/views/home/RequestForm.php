<div class="panel">
    <?php echo $this->beginContent("/home/toolbar", array("current" => 1)); ?>
    <?php echo $this->endContent(); ?>

    <div class="panel_body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'request-form',
            'enableAjaxValidation' => false
                ));
        ?>
        <div>
            <?php echo $form->labelEx($model, "device_id"); ?>
            <?php echo $form->dropdownList($model, "device_id", Device::getOptions()); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "request_problem"); ?>
            <?php echo $form->textField($model, "request_problem", array("size" => 120)); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "request_detail"); ?>
            <?php echo $form->textArea($model, "request_detail", array("cols" => 120, "rows" => 8)); ?>
        </div>
        <div>
            <?php echo $form->labelEx($model, "request_remark"); ?>
            <?php echo $form->textField($model, "request_remark", array("size" => 90)); ?>
        </div>
        <div>
            <label></label>
            <?php echo CHtml::submitButton("บันทึก"); ?>
        </div>
        <?php echo $form->hiddenField($model, "id"); ?>
        <?php $this->endWidget(); ?>
    </div>
</div>