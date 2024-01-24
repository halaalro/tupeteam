<?php

namespace common\models;
use yii\imagine;
use Yii;


/**
 * This is the model class for table "{{%video}}".
 *
 * @property int $id
 * @property string $title
 * @property string $describtion
 * @property string $tags
 * @property int $status
 * @property int $has_thumbnail
 * @property string $video_name
 * @property string $created_at
 * @property string|null $updated_at
 * @property string $creted_by
 * @property \common\models\VideoLik[]  $likes
 * @property \common\models\VideoLik[]  $dislikes

 */
class Video extends \yii\db\ActiveRecord
{const STATUS_UNLISTED =0 ;
    const STATUS_PUBLISHED =1 ;
    /**
     * @var \yii\web\UploadedFile
     */


    public $video;
    /**
     * @var \yii\web\UploadedFile
     */


     public $thumbnail;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'video_name', 'creted_by'], 'required'],
            [['describtion'], 'string'],
            [['status', 'has_thumbnail', 'creted_by'], 'integer'],
            [['creted_by','created_at', 'updated_at'], 'safe'],
            ['status',  'default', 'value' => self::STATUS_UNLISTED],
            ['has_thumbnail',  'default', 'value' => 0],
            ['thumbnail',  'image', 'minWidth' => 100],
            ['video',  'file', 'extensions' => ['mp4']],
            [['title', 'tags', 'video_name'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'describtion' => 'Describtion',
            'tags' => 'Tags',
            'status' => 'Status',
            'has_thumbnail' => 'Has Thumbnail',
            'video_name' => 'Video Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'creted_by' => 'Creted By',
            'thumbnail'=>'thumbnail',
        ];
    }
    public  function getStatusLabel(){
        return [

            self::STATUS_UNLISTED=>'UnListed',
            self::STATUS_PUBLISHED=>'Published',
        ] ;

    }

/**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getViews()
    {
        return $this->hasMany(VideoVieww::class, ['video_id' => 'id']);
    }/**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(VideoLik::class, ['video_id' => 'id'])
        ->liked();
    }/**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getDislikes()
    {
        return $this->hasMany(VideoLik::class, ['video_id' => 'id'])
        ->disliked();
    }
    /**
     * {@inheritdoc}
     * @return VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoQuery(get_called_class());
    }
    public function getCretedBy()
    {
        return $this->hasOne(User::class, ['id' => 'creted_by']);
    }
    public  function save($runValidation = true , $attributeNames = null)
    {
        $isInsert=$this->isNewRecord;
        if($isInsert){

            $this->title= $this->video->name;
            $this->video_name=$this->video->name;
            $this->creted_by=Yii::$app->user->identity->getId();
          
        }
        if( $this->thumbnail){
            $this->has_thumbnail=1;

        }
               $saved= parent::save($runValidation,$attributeNames);
               if(!$saved){
                return false;
               } 
               if($isInsert){
                $videopath=yii::getAlias(alias:'@frontend/web/storage/videos/'.$this->id.'.mp4');

                     if(!is_dir(dirname($videopath))){
                        FileHelper::createDirectory(dirname($videopath));
                      }
                      $this->video->saveAs($videopath);
               }
               if( $this->thumbnail){
                $thumbnailpath=yii::getAlias(alias:'@frontend/web/storage/thumb/'.$this->id.'.jpg');

                if(!is_dir(dirname($thumbnailpath))){
                   FileHelper::createDirectory(dirname($thumbnailpath));
                 }
                 $this->thumbnail->saveAs($thumbnailpath);  
                //  Image::getImagine()
                //  ->open($thumbnailpath)
                //  ->thumbnail (new Box(width:1280,height:1280))
                //  ->save();
            }
               return true;
               
    }
    public  function getVideoLink(){
        return 'http://localhost/tupeteam/advanced/frontend/web/storage/videos/'.$this->id.'.mp4';

    } public  function getThumbnailLink(){
        return 'http://localhost/tupeteam/advanced/frontend/web/storage/thumb/'.$this->id.'.jpg';

    }
    
    public  function isLikedBy($userId){
        return  VideoLik::find()
         ->userIdVideoId($userId,$this->id)
         ->liked()
         ->one();
     
     }public  function isDislikedBy($userId){
        return  VideoLik::find()
         ->userIdVideoId($userId,$this->id)
         ->disliked()
         ->one();
     
     }
}
