<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_lik".
 *
 * @property int $id
 * @property int $user_id
 * @property string $video_id
 * @property int|null $type
 * @property int|null $created_at
 *
 * @property User $user
 */
class VideoLik extends \yii\db\ActiveRecord
{
    const TYPE_LIK = 1 ;
    const TYPE_DISLIK = 0 ;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video_lik}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'video_id'], 'required'],
            [['user_id', 'type', 'created_at'], 'integer'],
            [['video_id'], 'string', 'max' => 16],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'video_id' => 'Video ID',
            'type' => 'Type',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
    public function getVideoBy()
    {
        return $this->hasOne(Video::class, ['id' => 'video_id']);
    }

    /**
     * {@inheritdoc}
     * @return VideoLikQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoLikQuery(get_called_class());
    }
}
