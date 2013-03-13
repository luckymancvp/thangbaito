<?php

/**
 * This is the DAO model class for table "setting".
 *
 * The followings are the available columns in table 'setting':
 * @property integer $id
 * @property string $access_key
 * @property string $secret_access_key
 * @property string $api_version
 * @property string $associate_id
 * @property string $japan_url
 * @property string $usa_url
 * @property string $updated_time
 */
abstract class SettingBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Setting the static model class
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
		return 'setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('access_key, secret_access_key, api_version, associate_id, japan_url, usa_url, updated_time', 'required'),
			array('access_key, secret_access_key, api_version, associate_id, japan_url, usa_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, access_key, secret_access_key, api_version, associate_id, japan_url, usa_url, updated_time', 'safe', 'on'=>'search'),
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
			'access_key' => 'Access Key',
			'secret_access_key' => 'Secret Access Key',
			'api_version' => 'Api Version',
			'associate_id' => 'Associate',
			'japan_url' => 'Japan Url',
			'usa_url' => 'Usa Url',
			'updated_time' => 'Updated Time',
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
		$criteria->compare('access_key',$this->access_key,true);
		$criteria->compare('secret_access_key',$this->secret_access_key,true);
		$criteria->compare('api_version',$this->api_version,true);
		$criteria->compare('associate_id',$this->associate_id,true);
		$criteria->compare('japan_url',$this->japan_url,true);
		$criteria->compare('usa_url',$this->usa_url,true);
		$criteria->compare('updated_time',$this->updated_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}