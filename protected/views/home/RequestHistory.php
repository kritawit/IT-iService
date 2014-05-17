<div class="panel">
    <?php echo $this->beginContent("/home/toolbar", array("current" => 2)); ?>
    <?php echo $this->endContent(); ?>
    
    <div class="panel_body">
        <div class="header-danger">รายการที่ยังไม่ปิดงาน</div>
        <?php 
        $this->widget('zii.widgets.grid.CGridView',array(
            'id' => 'request-grid',
            'dataProvider' => $model->searchMyHistory(),
            'columns' => array(
                array(
                    'name' => 'device_id',
                    'type' => 'html',
                    'value' => array($model,"getButtonView"),
                    'htmlOptions' => array(
                        'width'=>'100px',
                        'align'=>'center'
                    )
                ),
                array(
                    'name'=>'device_id',
                    'value' => '$data->device->device_brand_name." ".$data->device->device_name'
                ),
                array(
                    'name'=>'request_problem',
                    'value'=>'$data->request_problem',
                    'htmlOptions'=>array(
                        'width'=>'500px'
                    )
                ),
                array(
                    'name'=>'request_created_date',
                    'value'=>'$data->request_created_date',
                    'htmlOptions'=>array(
                        'width'=>'150px',
                        'align'=>'center'
                    )
                ),
                array(
                    'header'=>'แก้ไข',
                    'type'=>'html',
                    'value'=>array($model,"getButtonEditRequest"),
                    'htmlOptions'=>array(
                        'width'=>'35px',
                        'align'=>'center'
                    )
                ),
                array(
                    'header'=>'delete',
                    'type'=>'html',
                    'value'=>array($model,"getButtonDeleteRequest"),
                    'htmlOptions'=>array(
                        'width'=>'35px',
                        'align'=>'center',
                        'onclick'=>'return confirm("ยืนยันการลบ")'
                    )
                )
            ),
        ));
        ?>
        <br />
        <br />
        <div class="header-success">รายการที่ปิดงานแล้ว</div>
        <?php
        $this->widget('zii.widgets.grid.CGridView',array(
            'id'=>'request-grid',
            'dataProvider'=>$model->searchMyHistoryComplete(),
            'columns'=>array(
                array(
                    'name'=>'device_id',
                    'type'=>'html',
                    'value'=>array($model,"getButtonView"),
                    'htmlOptions'=>array(
                        'width'=>'100px',
                        'align'=>'center'
                    )
                ),
                array(
                  'name'=>'device_id',
                  'value'=>'$data->device->device_brand_name." ".$data->device->device_name'
                ),
                array(
                    'name'=>'request_problem',
                    'value'=>'$data->request_problem',
                    'htmlOptions'=>array(
                        'width'=>'500px'
                    )
                ),
                array(
                    'name'=>'request_created_data',
                    'value'=>'$data->request_created_data',
                    'htmlOptions'=>array(
                        'width'=>'150px',
                        'align'=>'center'
                    )
                )
            ),
        ));
        ?>
    </div>
</div>