<div class="panel">
    <?php echo $this->beginContent("/config/toolbar",array("current" => 2)); ?>
    <?php echo $this->endContent(); ?>
    
    <div class="panel_body">
        <a href="<?php echo Yii::app()->createUrl("Config/RepairTypeForm"); ?>">
            <?php echo CHtml::image("images/edit_add.png"); ?>
        </a>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'repair-types-grid',
            'dataProvider' => $model->search(),
            'columns' => array(
                array(
                    'name' => 'repair_type_name',
                    'htmlOptions' => array(
                        'width' => '430px'
                    )
                ),
                array(
                    'header' => 'edit',
                    'class' => 'CLinkColumn',
                    'imageUrl' => 'images/edit.png',
                    'urlExpression' => 'Yii::app()->createUrl("Config/RepairTypeForm", array("id" => $data->id))',
                    'htmlOptions' => array(
                        'width' => '35px',
                        'align' => 'center'
                    )
                ),
                array(
                    'header' => 'delete',
                    'class' => 'CLinkColumn',
                    'imageUrl' => 'images/delete.png',
                    'urlExpression' => 'Yii::app()->createUrl("Config/RepairTypeDelete", array("id" => $data->id))',
                    'htmlOptions' => array(
                        'width' => '35px',
                        'align' => 'center',
                        'onclick' => 'return confirm("ยืนยันการลบรายการ")'
                    )
                )
            ),
        ));
        ?>
    </div>
</div>
