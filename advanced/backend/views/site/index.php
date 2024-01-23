<?php
use \yii\helpers\Url;

/** @var yii\web\View $this */
/** @var  \common\models\Video $lateestVideo */
/** @var   $numberOfViews integer */
/** @var   $numberOfSubscribers integer */
/** @var  \common\models\Subscriber[] $subscribers  */

$this->title = 'My Yii Application';
?>








<div class="media mb-2 mt-4 d-flex flex-wrap">
    <?php if($lateestVideo){?>
          <div class="card m-2" style="width: 14rem;">
              <div class="embed-responsive  embed-responsive-16by9  mr-2" style="width:140px">
             <video class="object-fit-sm-contain border rounded"
              poster="<?php echo $lateestVideo->getThumbnailLink()?>"
               src="<?php echo $lateestVideo->getVideoLink()?>"
               >
              </video>
          </div> 



         








          <div class="card-body">
            <h5 class="card-title"><?php echo $lateestVideo->title?></h5>
          <p class="card-text">
            Likes: <?php echo $lateestVideo->getLikes()->count()?></br>
            Views: <?php echo $lateestVideo->getViews()->count()?>
            </p>
            <a href="<?php echo Url::to(['/videoo/update','id'=>$lateestVideo->id])?>"
             class="btn btn-primary">Edit</a>
          </div>
          </div>
<?php }



else{?>
    
    <div class="card m-2  d-flex" style="width: 14rem;">
              
    <div class="card-body">
      <h5 class="card-title">NO Any Video Add new Video</h5>
    
      
    
    </div>
</div>
<?php } ?>




          <div class="card m-2" style="width:14rem;">
              
          <div class="card-body">
            <h5 class="card-title">Total Views</h5>
          <p class="card-text" style="font-size:48px">
             <?php echo $numberOfViews ?>
            </p>
            
          </div>
          </div><div class="card m-2" style="width: 14rem;">
              
              <div class="card-body">
                <h5 class="card-title">Total Subscribers</h5>
              <p class="card-text"style="font-size:48px">
                 <?php echo$numberOfSubscribers ?>
                </p>
                



              </div></div><div class="card m-2" style="width: 14rem;">
              
              <div class="card-body">
                <h5 class="card-title">lateest Subscribers</h5>
              
                <?php foreach($subscribers  as $subscriber):?>
                    <?php echo $subscriber->user->username ?><br>
                <?php endforeach;?>

              </div>



                </div>


              </div>





          




    
</div>
