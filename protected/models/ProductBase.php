<?php

/**
 * This is the DAO model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $asin
 * @property string $StandardPrice
 * @property string $LowestNewPrice
 * @property string $ItemWidth
 * @property string $ItemHeight
 * @property string $ItemLength
 * @property string $ItemWeight
 * @property string $PackageWidth
 * @property string $PackageHeight
 * @property string $PackageLength
 * @property string $PackageWeight
 * @property string $ModelNumber
 * @property string $SalesRank
 * @property string $ImageS
 * @property string $ImageM
 * @property string $ImageL
 * @property string $fee
 * @property string $updated_time
 * @property string $country
 */
abstract class ProductBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('asin, country', 'length', 'max'=>45),
			array('StandardPrice, LowestNewPrice, ItemWidth, ItemHeight, ItemLength, ItemWeight, PackageWidth, PackageHeight, PackageLength, PackageWeight, ModelNumber, SalesRank, ImageS, ImageM, ImageL, fee', 'length', 'max'=>255),
			array('updated_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, asin, StandardPrice, LowestNewPrice, ItemWidth, ItemHeight, ItemLength, ItemWeight, PackageWidth, PackageHeight, PackageLength, PackageWeight, ModelNumber, SalesRank, ImageS, ImageM, ImageL, fee, updated_time, country', 'safe', 'on'=>'search'),
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
			'asin' => 'Asin',
			'StandardPrice' => 'Standard Price',
			'LowestNewPrice' => 'Lowest New Price',
			'ItemWidth' => 'Item Width',
			'ItemHeight' => 'Item Height',
			'ItemLength' => 'Item Length',
			'ItemWeight' => 'Item Weight',
			'PackageWidth' => 'Package Width',
			'PackageHeight' => 'Package Height',
			'PackageLength' => 'Package Length',
			'PackageWeight' => 'Package Weight',
			'ModelNumber' => 'Model Number',
			'SalesRank' => 'Sales Rank',
			'ImageS' => 'Image S',
			'ImageM' => 'Image M',
			'ImageL' => 'Image L',
			'fee' => 'Fee',
			'updated_time' => 'Updated Time',
			'country' => 'Country',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('asin',$this->asin,true);
		$criteria->compare('StandardPrice',$this->StandardPrice,true);
		$criteria->compare('LowestNewPrice',$this->LowestNewPrice,true);
		$criteria->compare('ItemWidth',$this->ItemWidth,true);
		$criteria->compare('ItemHeight',$this->ItemHeight,true);
		$criteria->compare('ItemLength',$this->ItemLength,true);
		$criteria->compare('ItemWeight',$this->ItemWeight,true);
		$criteria->compare('PackageWidth',$this->PackageWidth,true);
		$criteria->compare('PackageHeight',$this->PackageHeight,true);
		$criteria->compare('PackageLength',$this->PackageLength,true);
		$criteria->compare('PackageWeight',$this->PackageWeight,true);
		$criteria->compare('ModelNumber',$this->ModelNumber,true);
		$criteria->compare('SalesRank',$this->SalesRank,true);
		$criteria->compare('ImageS',$this->ImageS,true);
		$criteria->compare('ImageM',$this->ImageM,true);
		$criteria->compare('ImageL',$this->ImageL,true);
		$criteria->compare('fee',$this->fee,true);
		$criteria->compare('updated_time',$this->updated_time,true);
		$criteria->compare('country',$this->country,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}