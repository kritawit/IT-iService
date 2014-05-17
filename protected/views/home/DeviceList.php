<div class="panel">
    <?php echo $this->beginContent("/home/toolbar", array("current" => 3)); ?>
    <?php echo $this->endContent(); ?>

    <div class="panel_body">
        <a href="<?php echo Yii::app()->createUrl("Home/DeviceForm"); ?>">
            <?php echo CHtml::image("images/edit_add.png"); ?>
        </a>
        
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'repair-types-grid',
            'dataProvider' => $model->search(),
            'htmlOptions' => array('width' => '500px'),
            'columns' => array(
                'device_code',
                'device_name',
                'device_price',
                'device_brand_name',
                array(
                    'name' => 'device_buy_date',
                    'value' => '$data->device_buy_date',
                    'htmlOptions' => array(
                        'width' => '100px',
                        'align' => 'center'
                    )
                ),
                array(
                    'name' => 'device_garantee_expire_date',
                    'value' => '$data->device_garantee_expire_date',
                    'htmlOptions' => array(
                        'width' => '100px',
                        'align' => 'center'
                    )
                ),
                array(
                    'header' => 'edit',
                    'class' => 'CLinkColumn',
                    'imageUrl' => 'images/edit.png',
                    'urlExpression' => 'Yii::app()->createUrl("Home/DeviceForm", array("id" => $data->id))',
                    'htmlOptions' => array(
                        'width' => '35px',
                        'align' => 'center'
                    )
                ),
                array(
                    'header' => 'delete',
                    'class' => 'CLinkColumn',
                    'imageUrl' => 'images/delete.png',
                    'urlExpression' => 'Yii::app()->createUrl("Home/DeviceDelete", array("id" => $data->id))',
                    'htmlOptions' => array(
                        'width' => '35px',
                        'align' => 'center',
                        'onclick' => 'return confirm("ยืนยันการลบ")'
                    )
                )
            ),
        ));
        ?>
    </div>
</div>