<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href= https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css
    rel="stylesheet">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<div class=" wrap h-100 d-flex flex-column ">
     <?php echo $this->render(view:'_header')?>


     <main  class="d-flex ">
         

             <div class="content-wrapper p6">
                 <?= Breadcrumbs::widget([
                   'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                     ]) ?>
                  <?= Alert::widget() ?>
                   <?= $content ?>
             </div>
    </main>
</div>
<footer class="footer mt-auto py text-muted">
    <div class="container-footer">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
