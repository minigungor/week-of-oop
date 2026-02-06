<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Recruit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recruit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Order::find()->asArray()->all(), 'id', 'id')) ?>

    <?= $form->field($model, 'employee_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Employee::find()->all(), 'id', 'fullName')) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
