<div class="panel">
    <?php echo $this->beginContent("/config/toolbar",array("current"=>3)); ?>
    <?php echo $this->endContent(); ?>
<div class="panel_body">
    <a href="<?php echo Yii::app()->createUrl("Config/ProjectTypeForm"); ?>">
        <?php echo CHtml::image("images/edit_add.png"); ?>
    </a>
    <?php
    $this->widget('zii.widgets.grid.CGridView',array(
        'id'=>'repair-types-grid',
        'dataProvider'=>$model->search(),
        'htmlOptions'=>array('width'=>'500px'),
        'columns'=>array(
            'project_type_name',
            array(
                'header' => 'edit',
                'class' => 'CLinkColumn',
                'imageUrl'=>'images/edit.png',
                'urlExpression'=>  'Yii::app()->createUrl("Config/ProjectTypeForm",array("id"=>$data->id))',
                'htmlOptions'=>array(
                    'width'=>'35px',
                    'align'=>'center'
                )
            ),
            array(
                'header' => 'delete',
                'class' => 'CLinkColumn',
                'imageUrl'=>'images/delete.png',
                'urlExpression'=>  'Yii::app()->createUrl("Config/ProjectTypeDelete",array("id"=>$data->id))',
                'htmlOptions'=>array(
                    'width'=>'35px',
                    'align'=>'center',
                    'onclick'=>'return confirm("ยืนยันการลบ")'
                )
            )
        ),
    ));
    ?>
    
</div>
</div>