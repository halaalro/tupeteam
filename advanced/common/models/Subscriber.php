<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subscriber".
 *
 * @property int $id
 * @property int $channel_id
 * @property int $user_id
 * @property string $created_at
 */
class Subscriber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriber';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['channel_id', 'user_id'], 'required'],
            [['channel_id', 'user_id'], 'integer'],
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
            'channel_id' => 'Channel ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SubscriberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubscriberQuery(get_called_class());
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
