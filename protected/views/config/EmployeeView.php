<div class="panel">
    <?php echo $this->beginContent("/config/toolbar", array("current" => 5)); ?>
    <?php echo $this->endContent(); ?>

    <div class="panel_body">
        <?php $form = $this->beginWidget('CActiveForm'); ?>
        <div>
            <?php echo $form->labelEx($model, "employee_group"); ?>
            <input type="text" value="<?php echo $model->group->group_name; ?>" size="100" disabled />
        </div>
        <div>
            <?php echo $form->labelEx($model, "employee_sex"); ?>
            <input type="text" value="<?php echo Employee::getSexName($model->employee_sex); ?>" disabled />
        </div>
        <div>
            <?php echo $form->labelEx($model, "employee_fname"); ?>
            <input type="text" value="<?php echo $model->employee_fname; ?>" disabled />
        </div>
        <div>
            <?php echo $form->labelEx($model, "employee_lname"); ?>
            <input type="text" value="<?php echo $model->employee_lname; ?>" disabled />
        </div>
        <div>
            <?php echo $form->labelEx($model, "employee_code"); ?>
            <input type="text" value="<?php echo $model->employee_code; ?>" disabled />
        </div>
        <div>
            <?php echo $form->labelEx($model, "employee_username"); ?>
            <input type="text" value="<?php echo $model->employee_username; ?>" disabled />
        </div>
        <div>
            <?php echo $form->labelEx($model, "employee_email"); ?>
            <input type="text" value="<?php echo $model->employee_email; ?>" size="30" disabled />
        </div>
        <div>
            <?php echo $form->labelEx($model, "employee_tel"); ?>
            <input type="text" value="<?php echo $model->employee_tel; ?>" disabled />
        </div>
        <?php if (!empty($model->employee_image)): ?>
            <div>
                <?php echo $form->labelEx($model, "employee_image"); ?>
                <?php echo CHtml::image("/images/member_images/" . $model->employee_image); ?>
            </div>
        <?php endif ?>
        <?php $this->endWidget(); ?>
    </div>
</div>