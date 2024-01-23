<?php
/** User:TheCodeholic ... */
namespace backend\assets;

use yii\web\AssetBundle;
/**
 * Class TagsInputAsset
 * @package backend\assets
 */
class TagsInputAsset extends AssetBundle
{
    public $basePath = '@webroot/tagsinput';
    public $baseUrl = '@web/tagsinput';
    public $css = [
        'tagsinput.css',
    ];
    public $js = [
        'tagsinput.js'
    ];
    public $depends = [
          JqueryAsset::class
    ];
}