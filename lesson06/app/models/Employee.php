<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string|null $email
 * @property int $status
 *
 * @property Assignment[] $assignments
 * @property Assignment[] $assignments0
 * @property Bonus[] $bonuses
 * @property Dismiss[] $dismisses
 * @property Interview[] $interviews
 * @property Recruit[] $recruits
 * @property Vacation[] $vacations
 */
class Employee extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'default', 'value' => null],
            [['first_name', 'last_name', 'address', 'status'], 'required'],
            [['status'], 'integer'],
            [['first_name', 'last_name', 'address', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Assignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignments()
    {
        return $this->hasMany(Assignment::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Assignments0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignments0()
    {
        return $this->hasMany(Assignment::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Bonuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBonuses()
    {
        return $this->hasMany(Bonus::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Dismisses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDismisses()
    {
        return $this->hasMany(Dismiss::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Interviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInterviews()
    {
        return $this->hasMany(Interview::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Recruits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecruits()
    {
        return $this->hasMany(Recruit::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Vacations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacations()
    {
        return $this->hasMany(Vacation::class, ['employee_id' => 'id']);
    }

}
