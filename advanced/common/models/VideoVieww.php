<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_view".
 *
 * @property int $id
 * @property int $video_id
 * @property int|null $user_id
 * @property string $created_at
 */
class VideoVieww extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video_view}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id'], 'required'],
            [['video_id', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return VideoViewwQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoViewwQuery(get_called_class());
    }
    public function getCretedBy()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
    public function getVideoBy()
    {
        return $this->hasOne(Video::class, ['id' => 'video_id']);
    }
}
