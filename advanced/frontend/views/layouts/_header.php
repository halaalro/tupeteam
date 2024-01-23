<?php 
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg bg-body-tertiary shadow-sm',
        ],
    ]);
    $menuItems = [
    ];
    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Login', 'url' => ['/site/signup']];

        // $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        
    } ?>
    
    <form action="<?php echo Url::to(['/videoo/search'])?>" 
    class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" 
    name="keyword" 
    value="<?php echo Yii::$app->request->get(name:'keyword')?>">
    <button class="btn btn-outline-success my-2 my-sm-0" >Search</button>
  </form>    
   <?php  echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('signup',['/site/signup'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);

        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
            
    }
    NavBar::end();
    ?>
</header>