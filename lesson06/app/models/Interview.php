<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interview".
 *
 * @property int $id
 * @property string $date
 * @property string $firstName
 * @property string $lastName
 * @property string|null $email
 * @property int $status
 * @property string|null $reject_reason
 * @property int|null $employee_id
 *
 * @property Employee $employee
 */
class Interview extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';

    const STATUS_NEW = 1;
    const STATUS_PASS = 2;
    const STATUS_REJECT = 3;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interview';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'reject_reason', 'employee_id'], 'default', 'value' => null],
            [['date', 'firstName', 'lastName', 'status'], 'required'],
            [['date'], 'safe'],
            [['status', 'employee_id'], 'integer'],
            [['firstName', 'lastName', 'email', 'reject_reason'], 'string', 'max' => 255],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'status' => 'Status',
            'reject_reason' => 'Reject Reason',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }

}
