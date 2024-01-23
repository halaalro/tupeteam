<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var $dataProvider yii\data\ActiveDataProvider  */



    ?>
    <h1> My History Videw</h1>

    <?php echo yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'pager'=>[

            'class'=>\yii\bootstrap5\LinkPager::class,
        ],
        'itemView'=>'_video_item',
        'layout'=>'<div class="d-flex flex-wrap">{items}</div>{pager}',
        'itemOptions'=>[

            'tag'=>false
        ]
        
        
        
        
        ])?>

      
