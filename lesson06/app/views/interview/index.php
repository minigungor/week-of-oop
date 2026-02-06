<?php

use app\models\Interview;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\forms\search\InterviewSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Interviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interview-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Interview', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'firstName',
            'lastName',
            'email:email',
            [
                'attribute' => 'status',
                'filter' => \app\helpers\InterviewHelper::getStatusList(),
                'value' => function (Interview $interview) {
                    return \app\helpers\InterviewHelper::getStatusName($interview->status);
                }
            ],
            //'status',
            //'reject_reason',
            //'employee_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Interview $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
