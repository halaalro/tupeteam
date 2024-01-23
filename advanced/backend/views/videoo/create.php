<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form= \yii\bootstrap5\ActiveForm::begin([

'options'=>['enctype'=>'multipart/form-data']
])?>            <?php echo $form->errorSummary($model)?>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="upload-icon"><i class="fa-solid fa-upload"></i></div>
   
        <p class="m-0">Drag and drop a file you want to upload </p>
    
        <p class="text-muted">Your video will be private until you publish it</p>
        


        <button class="btn btn-primary btn-file">
        select file<input type="file" id="videoFile" name="video">

        </button>
        <?php \yii\bootstrap5\ActiveForm::end()?>

     </div> 

</div>
