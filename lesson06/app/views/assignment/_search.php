<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\forms\search\Assignment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="assignment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'position_id') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'salary') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
