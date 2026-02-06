<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assignment".
 *
 * @property int $id
 * @property int $order_id
 * @property int $employee_id
 * @property int $position_id
 * @property string $date
 * @property float $rate
 * @property int $salary
 * @property int $active
 *
 * @property Employee $employee
 * @property Employee $employee0
 * @property Order $order
 */
class Assignment extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'employee_id', 'position_id', 'date', 'rate', 'salary', 'active'], 'required'],
            [['order_id', 'employee_id', 'position_id', 'salary', 'active'], 'integer'],
            [['date'], 'safe'],
            [['rate'], 'number'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
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
            'order_id' => 'Order ID',
            'employee_id' => 'Employee ID',
            'position_id' => 'Position ID',
            'date' => 'Date',
            'rate' => 'Rate',
            'salary' => 'Salary',
            'active' => 'Active',
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

    /**
     * Gets query for [[Employee0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee0()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

}
