<?php
class Product extends CActiveRecord
{
    /**
     * Флаг наличия товарной позиции в продаже
     * @var int	$archive
     */
	public $archive = 0;
	
	/**
	 * @return string Имя таблицы в БД
	 */
	public function tableName()
	{
		return '{{products}}';
	}

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Правила валидации
	 */
	public function rules()
	{
		return array(
			array('name, price', 'required'),
			array('name', 'length', 'max'=>50)
		);
	}
	
	/**
	 * @return array Массив с описанием связей
	 */
	public function relations()
	{
		return array(
			// Заказы
			'orders'=> array(self::HAS_MANY, 'Order', 'prod_id')
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'name' => 'Name'
		);
	}
}