<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Vacation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vacation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->dropDownList(ArrayHelper::map(\app\models\Order::find()->asArray()->all(), 'id', 'id')) ?>

    <?= $form->field($model, 'employee_id')->dropDownList(ArrayHelper::map(\app\models\Employee::find()->all(), 'id', 'fullName')) ?>

    <?= $form->field($model, 'date_from')->textInput() ?>

    <?= $form->field($model, 'date_to')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
