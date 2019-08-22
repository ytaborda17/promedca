<?php

/**
 * This is the model class for table "productos_atributos".
 *
 * The followings are the available columns in table 'productos_atributos':
 * @property integer $id
 * @property integer $producto_id
 * @property integer $tipo_id
 * @property integer $posicion_id
 * @property string $titulo
 * @property string $texto
 * @property integer $lista
 * @property string $pic
 * @property integer $sortOrder
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Productos $producto
 * @property PAtributosPosicion $posicion
 * @property PAtributosTipos $tipo
 */
class ProductosAtributos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productos_atributos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producto_id, tipo_id, posicion_id', 'required'),
			array('producto_id, tipo_id, posicion_id, lista, sortOrder, estatus', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>250),
			array('pic', 'length', 'max'=>4),
			array('texto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, producto_id, tipo_id, posicion_id, titulo, texto, lista, pic, sortOrder, estatus', 'safe', 'on'=>'search'),
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
			'producto' => array(self::BELONGS_TO, 'Productos', 'producto_id'),
			'posicion' => array(self::BELONGS_TO, 'PAtributosPosicion', 'posicion_id'),
			'tipo' => array(self::BELONGS_TO, 'PAtributosTipos', 'tipo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'producto_id' => 'Producto',
			'tipo_id' => 'Tipo',
			'posicion_id' => 'Posicion',
			'titulo' => 'Titulo',
			'texto' => 'Texto',
			'lista' => 'Lista',
			'pic' => 'Pic',
			'sortOrder' => 'Sort Order',
			'estatus' => 'Estatus',
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
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('tipo_id',$this->tipo_id);
		$criteria->compare('posicion_id',$this->posicion_id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('lista',$this->lista);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('sortOrder',$this->sortOrder);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductosAtributos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
