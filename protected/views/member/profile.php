<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'employee-form',
    'enableAjaxValidation' => false,
        ));
?>

<div class="panel" style="margin-left: 10px">
    <div class="panel_header">แก้ไขข้อมูลส่วนตัว</div>
    <div class="panel_body grid-view">
        <table class="items" width="100%">
            <thead>
                <tr>
                    <th width="370px">ข้อมูลทั่วไป</th>
                    <th>กลุ่มผู้ใช้งานระบบ</th>
                </tr>
            </thead>
            <tbody>
                <tr valign="top">
                    <td>
                        <div>
                            <?php echo $form->labelEx($model, "employee_sex"); ?>
                            <?php echo $form->radioButton($model, 'employee_sex', array(
                            'value'=>"m",
                            'uncheckValue'=>null)); ?>ชาย
                            
                            <?php echo $form->radioButton($model, 'employee_sex', array(
                            'value'=>"f",
                            'uncheckValue'=>null)); ?>หญิง
                        </div>
                        <div>
                            <?php echo $form->labelEx($model, "employee_fname"); ?>
                            <?php echo $form->textField($model, "employee_fname"); ?>
                        </div>
                        <div>
                            <?php echo $form->labelEx($model, "employee_lname"); ?>
                            <?php echo $form->textField($model, "employee_lname"); ?>
                        </div>
                        <div>
                            <?php echo $form->labelEx($model, "employee_code"); ?>
                            <?php echo $form->textField($model, "employee_code"); ?>
                        </div>
                        <div>
                            <?php echo $form->labelEx($model, "employee_username"); ?>
                            <?php echo $form->textField($model, "employee_username"); ?>
                        </div>
                        <div>
                            <?php echo $form->labelEx($model, "employee_password"); ?>
                            <?php echo $form->textField($model, "employee_password"); ?>
                        </div>
                        <div>
                            <?php echo $form->labelEx($model, "employee_email"); ?>
                            <?php echo $form->textField($model, "employee_email"); ?>
                        </div>
                        <div>
                            <?php echo $form->labelEx($model, "employee_tel"); ?>
                            <?php echo $form->textField($model, "employee_tel"); ?>
                        </div>
                        <div>
                            <?php echo $form->labelEx($model, "employee_image"); ?>
                            <?php echo $form->fileField($model, "employee_image"); ?>
                        </div>
                        <?php echo $form->hiddenField($model,"id") ?>
                    </td>
                    <td>
                        <?php echo Group::getOptions("Employee[group_id]", $model->id); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        
                        <?php echo CHtml::submitButton("บันทึกข้อมูล", array("class" => "button")); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endWidget(); ?>