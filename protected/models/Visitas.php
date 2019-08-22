<?php

/**
 * This is the model class for table "visitas".
 *
 * The followings are the available columns in table 'visitas':
 * @property integer $id
 * @property string $timeStamp
 * @property string $ipAddress
 * @property integer $status
 * @property string $city
 * @property string $region
 * @property string $countryName
 * @property string $countryCode
 * @property string $latitude
 * @property string $longitude
 */
class Visitas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'visitas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('ipAddress', 'length', 'max'=>50),
			array('city, region, countryName', 'length', 'max'=>100),
			array('countryCode', 'length', 'max'=>5),
			array('latitude, longitude', 'length', 'max'=>20),
			array('timeStamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, timeStamp, ipAddress, status, city, region, countryName, countryCode, latitude, longitude', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'timeStamp' => 'Time Stamp',
			'ipAddress' => 'Ip Address',
			'status' => 'Status',
			'city' => 'City',
			'region' => 'Region',
			'countryName' => 'Country Name',
			'countryCode' => 'Country Code',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('timeStamp',$this->timeStamp,true);
		$criteria->compare('ipAddress',$this->ipAddress,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('countryName',$this->countryName,true);
		$criteria->compare('countryCode',$this->countryCode,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Visitas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
