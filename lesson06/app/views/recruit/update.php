<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Recruit $model */

$this->title = 'Update Recruit: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recruits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recruit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
