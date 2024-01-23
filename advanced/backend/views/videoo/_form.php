<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\widgets\ActiveForm $form */
\backend\assets\TagsInputAsset::register($this);
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <div class="row">
            <div class="col-sm-8">
            <?php echo $form->errorSummary($model)?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'describtion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
    <label>
    <?php echo $model->getAttributeLabel(attribute:'thumbnail') ?>

</label>

<div class="input-group mb-3">
  <input type="file" class="form-control" id="thumbnail" name="thumbnail">
  <label class="input-group-text" for="thumbnail">chose file</label>
  </div></div>


  
      

    <?= $form->field($model, 'tags',['inputOptions'=>['data-role'=>'tagsinput',],
      
      
    ])->textInput(['maxlength' => true]) ?>

</div>

<div class="col-sm-4" >
        
        <div class="embed-responsive  embed-responsive-16by9">
         <video class="object-fit-sm-contain border rounded"
          poster="<?php echo $model->getThumbnailLink()?>"
         src="<?php echo $model->getVideoLink()?>"
         controls>
          </video>

          </div> 



        <div class="mb-3">
            <div class="text-muted">video link </div>
            <a href="<?php echo $model->getVideoLink()?>">

             open video
            </a>
            
        </div>


        <div class="mb-3">
         <div class="text-muted">video name </div>
           <?php echo $model->video_name?>
           </div>

         <?= $form->field($model, 'status')->dropDownList($model->getStatusLabel()) ?>

       </div>

   </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
