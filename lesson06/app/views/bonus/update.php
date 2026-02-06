<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bonus $model */

$this->title = 'Update Bonus: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bonuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bonus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
