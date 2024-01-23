<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>'<div class="d-flex flex-wrap">{items}</div>{pager}',        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           [
            'attribute'=>'title',
            'content'=>function($model){
                return $this->render('_video_item',['model'=>$model]);
            }
         
        ],
            //'title',
            //'describtion:ntext',
            //'tags',
            //'status',
            [
                'attribute'=>'status',
                'content'=>function($model){
                    return $model->getStatusLabel()[$model->status];
                }
             
            ],
            //'has_thumbnail',
            //'video_name',
            'created_at',
            'updated_at',
            //'creted_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Video $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
