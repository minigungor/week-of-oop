<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dismiss $model */

$this->title = 'Create Dismiss';
$this->params['breadcrumbs'][] = ['label' => 'Dismisses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dismiss-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
