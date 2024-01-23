<aside class="shadow">
<?php echo  \yii\bootstrap5\Nav::widget([
    'options'=>[
      'class'=>'d-flex flex-column nav-pills p6'
    ],
    'encodeLabels'=>false,

    'items'=>[
      
      [
        'label'=>'<i class="fa-solid fa-gauge"></i> Dashbord',
        'url'=>['/site/index']
      ],[
        'label'=>'<i class="fa-solid fa-video"></i> Videos',
        'url'=>['/videoo/index']
      ]
    ]
  ])?>
</aside>

