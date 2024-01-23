<?php
/** @var  common\models\User $channel*/
use yii\helpers\Url;

?><a class="btn <?php echo $channel->isSubscribed(Yii::$app->user->id)?
'btn-secondary':'btn-danger'?>" href="<?php echo Url::to(['/channel/subscribe',
  'username'=>$channel->username])?>" data-method="post"  role="button" data-pjax="1">Subscribe 
    <i class="fa-sharp fa-solid fa-bell"></i> </a>  <?php echo $channel->getSubscribe()->count()?> 