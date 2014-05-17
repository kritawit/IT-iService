<?php

class Device extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'devices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('device_type_id, device_name, device_brand_name, device_code,device_record_code, device_price, device_created_date, device_buy_date, device_garantee_expire_date', 'required'),
			array('device_type_id, device_price', 'numerical', 'integerOnly'=>true),
			array('device_name, device_brand_name', 'length', 'max'=>255),
			array('device_code', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, device_type_id, device_name, device_brand_name, device_code,device_record_code, device_price, device_created_date, device_buy_date, device_garantee_expire_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
                    "device_type"=>array(self::BELONGS_TO,"DeviceType","device_type_id")
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'device_type_id' => 'ประเภทวัสดุ/อุปกรณ์',
			'device_name' => 'ชื่อ',
			'device_brand_name' => 'ยี่ห้อ',
			'device_code' => 'code',
                        'device_record_code'=>'หมายเหตุ',
			'device_price' => 'ราคาซื้อ',
			'device_created_date' => 'วันที่บันทึก',
			'device_buy_date' => 'วันที่ซื้อ',
			'device_garantee_expire_date' => 'วันหมดประกัน',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function beforeValidate() {
            if($this->isNewRecord){
                $this->device_created_date = new CDbExpression("NOW()");
            }
            return parent::beforeValidate();
        }
        public static function getOptions(){
            $devices = Device::model()->findAll();
            $arr = array();
            
            foreach($devices as $r){
                $arr[$r->id]=$r->device_brand_name." ".$r->device_name;
            }
            return $arr;
        } 

        /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Device the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
