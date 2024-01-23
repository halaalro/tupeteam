<?php

/**  @var $channel \common\models\User */
/**  @var $user \common\models\User */?>
<p>Hello <?php echo $channel->username?> </p>
<p>User <?php echo \common\helper\Html::channelLink($user,schema:true)?> has subscribed to you</p>
<p>CodeTube team </p>

