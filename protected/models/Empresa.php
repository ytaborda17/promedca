<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id
 * @property string $nombre
 * @property string $nombre_legal
 * @property string $rif
 * @property string $impuesto
 * @property string $direccion
 *
 * The followings are the available model relations:
 * @property Contacto[] $contactos
 * @property Filosofia[] $filosofias
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, nombre, nombre_legal, rif, impuesto, direccion', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('nombre, nombre_legal', 'length', 'max'=>100),
			array('rif', 'length', 'max'=>20),
			array('impuesto', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, nombre_legal, rif, impuesto, direccion', 'safe', 'on'=>'search'),
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
			'contactos' => array(self::HAS_MANY, 'Contacto', 'empresa_id'),
			'filosofias' => array(self::HAS_MANY, 'Filosofia', 'empresa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'nombre_legal' => 'Nombre Legal',
			'rif' => 'Rif',
			'impuesto' => 'Impuesto',
			'direccion' => 'Direccion',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nombre_legal',$this->nombre_legal,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('impuesto',$this->impuesto,true);
		$criteria->compare('direccion',$this->direccion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
