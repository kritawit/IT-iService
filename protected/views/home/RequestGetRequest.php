<div class="panel">
    <?php echo $this->beginContent("/home/toolbar",array("current"=>4)); ?>
    <?php echo $this->endContent(); ?>
    <div class="panel_body">
        <?php
        $this->widget('zii.widgets.grid.CGridView',array(
          'id'=>'reguest-grid',
          'dataProvider'=>$model->searchRequest(),
          'columns'=>array(
             array(
                 'name'=>'device.device_code',
                 'type'=>'html',
                 'value'=>array($model,"getButtonGetRequestView"),
                 'htmlOptions'=>array(
                     'width'=>'100px',
                     'align'=>'center'
                 )
               ),
              array(
                  'name'=>'device._brand_name',
                  'value'=>'$data->device->device_brand_name." ".$data->device->device_name',
                  'htmlOptions'=>array(
                      'width'=>'200px'
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
                      'width'=>'140px',
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
            ),
        ));
        ?>
    </div>
</div>