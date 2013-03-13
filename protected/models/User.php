<?php
class User extends UserBase
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public $repeat_password;


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.

        return array_merge(parent::rules(), array(
            array('username', 'unique'),
            array('repeat_password', 'required', 'on'=>'insert'),
            array('repeat_password', 'compare', 'compareAttribute'=>'password', 'on'=>'insert'),
        ));
    }

    /**
     * @return bool|void
     */
    public function beforeSave(){
        $this->password = md5($this->password);
        return true;
    }
}