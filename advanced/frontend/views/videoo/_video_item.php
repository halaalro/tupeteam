<?php
/**
 * @var $model \common\models\Video
 */
use yii\helpers\Html;

use \yii\helpers\StringHelper;
use \yii\helpers\Url;


?>
<div class="card m-3" style="width: 14rem;">
<a href="<?php echo Url::to(['/videoo/view','id'=>$model->id])?>">
<div class="embed-responsive  embed-responsive-16by9">
         <video class="object-fit-sm-contain border rounded"
          poster="<?php echo $model->getThumbnailLink()?>"
         src="<?php echo $model->getVideoLink()?>"
         >
          </video>

          </div> </a>
  <div class="card-body p-2">
    <h5 class="card-title"><?php echo $model->title?></h5>
    <p >
    <?php echo \common\helper\Html::channelLink($model->cretedBy)
                      ?> 
    <?php /*echo Html::a($model->cretedBy->username,[
                        '/channel/view','username'=>$model->cretedBy->username])*/?>    </p> 
    <p class="text-muted card-text m-0"> 
    <?php echo $model->getViews()->count()?> views .

        <?php echo Yii::$app->formatter->asRelativeTime($model->created_at)?></p>
  </div>
</div>