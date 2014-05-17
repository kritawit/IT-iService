<div class="panel">
    <?php echo $this->beginContent("/home/toolbar",array("current"=>5)); ?>
    <?php echo $this->endContent(); ?>
    <div class="panel_body">
        <?php 
        $this->widget('zii.widgets.grid.CGridView',array(
            'id'=>'request-grid',
            'dataProvider'=>$model->searchGetRepair(),
            'columns'=>array(
                array(
                    'name'=>'device.device_code',
                    'type'=>'html',
                    'value'=>array($model,"getButtonGetRepairView")
                ),
                array(
                    'name'=>'employee_id',
                    'value'=>'$data->employee->employee_fname." ".$data->employee->employee_lname',
                    'htmlOptions'=>array(
                        'width'=>'150px'
                    )
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
                        'width'=>'500px',
                        'align'=>'center'
                    )
                ),
                array(
                    'name'=>'request_status',
                    'value'=>array($model,'getRequestStatus'),
                    'htmlOptions'=>array(
                        'width'=>'80px',
                        'align'=>'center'
                    )
                )
            )
        ));?>
    </div>
</div>