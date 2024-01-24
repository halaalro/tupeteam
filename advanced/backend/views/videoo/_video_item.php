<?php

/**
 * @var $model \common\models\Video
 */
use \yii\helpers\StringHelper;
use \yii\helpers\Url;
?>

<div class="d-flex "style="width: 14rem;" >
<a href="<?php echo Url::to(['/videoo/update','id'=>$model->id])?>">
  <div class="d-flex width:80px hight:1px">
  <div class="embed-responsive  embed-responsive-16by9 mr-3"style="width:80px ,hight:1px">
         <video class="object-fit-sm-contain border rounded" style="width:10rem"
          poster="<?php echo $model->getThumbnailLink()?>"
         src="<?php echo $model->getVideoLink()?>"
         controls>
          </video>

              </a> 
  
</div>
<div class="flex-grow-1 ms-1" style="width:20rem">
<h6><?php echo $model->title?></h6> 
<?php echo StringHelper::truncateWords($model->describtion,count:4)?>
 </div>
 </div>