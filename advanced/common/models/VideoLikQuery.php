<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[VideoLik]].
 *
 * @see VideoLik
 */
class VideoLikQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VideoLik[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VideoLik|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function userIdVideoId($userId,$videoId)
    {
        return $this->andWhere([
 
              'video_id'=>$videoId,
              
              'user_id'=>$userId
        ]);
    }
    public function liked()
    {
        return $this->andWhere(['type'=>VideoLik::TYPE_LIK]);
    } 
    public function disliked()
    {
        return $this->andWhere(['type'=>VideoLik::TYPE_DISLIK]);
    }
}
