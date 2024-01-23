<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\helpers\Url;


/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var  common\models\Video[] $similerVideos */

$similerVideo


?>
<div class="row">
    <div class="col-sm-8">
    <div class="embed-responsive  embed-responsive-16by9">
         <video class="object-fit-sm-contain border rounded"
          poster="<?php echo $model->getThumbnailLink()?>"
         src="<?php echo $model->getVideoLink()?>"
         controls>
          </video>
          </div> 
          <h5 class="card-title"><?php echo $model->title?></h5>
          
          <div class=" d-flex justify-content-between align-items-center">
            <div>
            <?php echo $model->getViews()->count()?> views .
               
               <?php echo Yii::$app->formatter->asRelativeTime($model->created_at)?>
            </div>
            <div>


            <?php \yii\widgets\pjax::begin()?>
             <?php echo  $this->render('_button',[
                'model'=>$model


             ])?>
            <?php \yii\widgets\pjax::end()?>
            </div>
             
         </div>
         <div>
                <p>
                <?php echo \common\helper\Html::channelLink($model->cretedBy)
                      ?> 
                     
                </p>
                <?php echo Html::encode($model->describtion)?>
            </div>
             </div>





   <div class="col-sm-4">
       <?php foreach($similerVideos as $similerVideo ):?>
              <div class="media mb-2 mt-4">
               <a href="<?php echo Url::to(['/videoo/view','id'=>$similerVideo->id])?>">
                  <div class="embed-responsive  embed-responsive-16by9 mr-2" 
                  style="width:140px">
                      <video class="object-fit-sm-contain border rounded"
                          poster="<?php echo $similerVideo->getThumbnailLink()?>"
                          src="<?php echo $similerVideo->getVideoLink()?>"
                          >
                      </video>
                   </div>     
               </a>      
               <div class="media-body">
               <h6 class="m-0"><?php echo $similerVideo->title?></h6>
               <div class="text-muted">
                  <p class="m-0">

                  <?php echo \common\helper\Html::channelLink($similerVideo->cretedBy)?>
                  </p>
                  <small>
                    <p>
                     <?php echo $similerVideo->getViews()->count()?> views .
                     <?php echo Yii::$app->formatter->asRelativeTime($similerVideo->created_at)?>
                     </p>
                 </small>
               </div>
         </div>
       </div>
       <?php endforeach;?>
       
   </div>
</div>
       
   