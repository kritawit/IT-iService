<div class="panel">
    <?php echo $this->beginContent("/home/toolbar",array("current"=>6)); ?>
    <?php echo $this->endContent(); ?>
    <div class="panel_body">
        <?php  
        $this->widget('zii.widgets.grid.CGridView',array(
            'id'=>'request-grid',
            'dataProvider'=>$model->searchRepairEnd(),
            'columns'=>array(
                array(
                    'name'=>'device.device_code',
                    'type'=>'html',
                    'value'=>array($model,"getButtonRepairEndView")                        
                    ),
                array(
                    'name'=>'employee_id',
                    'value'=>'$data->employee->employee_fname." ".$data->employee->employee_lname'
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
                        'width'=>'140px',
                        'align'=>'center'
                    )
                ),
                array(
                    'name'=>'request_status',
                    'value'=>'$data->request_status',
                    'htmlOptions'=>array(
                        'width'=>'140px',
                        'align'=>'center'
                    )
                ),
               )
          ));?>
    </div>
</div>