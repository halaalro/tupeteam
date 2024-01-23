<?php
/** @var $this \yii\web\View  */
/** @var common\models\User $channel */

/** @var $dataProvider yii\data\ActiveDataProvider  */
use yii\helpers\Url;

?>

<div class="jumbotron">
  <h1 class="display-4"><?php echo $channel->username?></h1>
  <hr class="my-4">
  <?php \yii\widgets\pjax::begin()?>
  <?php echo  $this->render('_subscribe',[
                'channel'=>$channel


             ])?>
    <?php \yii\widgets\pjax::end()?>
</div>
<?php echo yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView'=>'@frontend/views/videoo/_video_item',
        'layout'=>'<div class="d-flex flex-wrap">{items}</div>{pager}',
        'itemOptions'=>[

            'tag'=>false
        ]
        
        
        
        
        ])?>
