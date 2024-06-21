<?php

/**
 * This is the model class for table "attendance_logs".
 *
 * The followings are the available columns in table 'attendance_logs':
 * @property integer $id
 * @property integer $userid
 * @property string $date
 * @property string $time_in
 * @property string $day
 */
class AttendanceLogs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AttendanceLogs the static model class
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
		return 'attendance_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, date, time_in, day', 'required'),
			array('userid', 'numerical', 'integerOnly'=>true),
			array('date, time_in', 'length', 'max'=>30),
			array('day', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userid, date, time_in, day', 'safe', 'on'=>'search'),
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
			'userid' => 'Userid',
			'date' => 'Date',
			'time_in' => 'Time In',
			'day' => 'Day',
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
		$criteria->compare('userid',$this->userid);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time_in',$this->time_in,true);
		$criteria->compare('day',$this->day,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}