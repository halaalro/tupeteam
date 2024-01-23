<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoVieww;
use common\models\VideoLik;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class VideooController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
           
            'access'=>[
                'class'=>AccessControl::class,
                'only'=>['like','dislike','history'],
                'rules'=>[[
                    'allow'=>true,
                    'roles'=>['@']
                     ]
                    
                   ]
                ],
                'verb' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'like' => ['POST'],
                        'dislike' => ['POST'],
                    ]
                ]
             ];
                  
    }

   
    public function actionIndex()
    { $this->layout='main';
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()
            ->published()
            ->latest(),
            'pagination'=>[
                'pageSize'=>8
            ]
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionView($id)
    {  
        $this->layout='auth';
        $video=$this->findVideo($id);
        $videoView=new VideoVieww();
        $videoView->video_id=$id;
        $videoView->user_id= \yii::$app->user->id;
        $videoView->save();
         

        //VIDEO similer
        $similerVideos=Video::find()
        ->published()
        ->byKeyword($video->title)
        ->andWhere(['NOT',['id'=>$id]])
        ->limit(10)
        ->all();
        return $this->render('view', [
            'model' => $video,
            'similerVideos'=>$similerVideos
        ]);
    }

//action like

    public function actionLike($id){
        $video=$this->findVideo($id);
        $userId= \yii::$app->user->id;

        $videoLikeDislike= VideoLik::find()
        ->userIdVideoId($userId,$id)
        ->one();


        
        if(!$videoLikeDislike){

            $this->saveLikeDislike($id,$userId,type:VideoLik::TYPE_LIK);
            

        }else if($videoLikeDislike->type==VideoLik::TYPE_LIK){
            $videoLikeDislike->delete();
        }else{
            $videoLikeDislike->delete();
            $this->saveLikeDislike($id,$userId,type:VideoLik::TYPE_LIK);


        }
        
        return $this->renderAjax('_button',[

            'model'=>$video
        ]);
       

    }
    
    //action dislike
    public function actionDislike($id){
        $video=$this->findVideo($id);
        $userId= \yii::$app->user->id;

        $videoLikeDislike= VideoLik::find()
        ->userIdVideoId($userId,$id)
        ->one();
        if(!$videoLikeDislike){

            $this->saveLikeDislike($id,$userId,type:VideoLik::TYPE_DISLIK);

        }else if($videoLikeDislike->type == VideoLik::TYPE_DISLIK){
            $videoLikeDislike->delete();
        }else{
            $videoLikeDislike->delete();
            $this->saveLikeDislike($id,$userId,type:VideoLik::TYPE_DISLIK);


        }
        
        return $this->renderAjax('_button',[

            'model'=>$video
        ]);
       

    }

//search


public function actionSearch($keyword){
    $this->layout='main';
    $query = Video::find()
        ->published()
        ->latest();
        if($keyword){

            $query->byKeyword($keyword)
            ->orderBy("MATCH(title, describtion, tags)
            AGAINST ('$keyword')DESC");
        }
        
    $dataProvider = new ActiveDataProvider([
        'query'=>$query
        
    ]);

    return $this->render('search', [
        'dataProvider' => $dataProvider,
    ]);


}

//history video

public function actionHistory(){
   
    $this->layout='main';
    $query = Video::find()
        ->alias('v')
        ->innerJoin("(SELECT video_id, MAX(created_at) as max_date FROM video_view 
        WHERE user_id= :userId
        GROUp BY video_id) vv" , 'vv.video_id= v.id',[

            'userId'=>\Yii::$app->user->id
        ])
        ->orderBy("vv.max_date DESC");
        
        
    $dataProvider = new ActiveDataProvider([
        'query'=>$query,
        'pagination'=>[
            'pageSize'=>8
        ]
        
    ]);

    return $this->render('history', [
        'dataProvider' => $dataProvider,
    ]);


}


    //action find video
    protected function findVideo($id){
        $video=Video::findOne($id);
        if(!$video){


            throw new NotFoundHttpException(message:"video does not exit ");
        }
       return $video;

    }




//action save like
    protected function saveLikeDislike($id,$userId,$type){

        $videoLikeDislike=new VideoLik();
        $videoLikeDislike->video_id=$id;
        $videoLikeDislike->user_id=$userId;
        $videoLikeDislike->type=$type;
        $videoLikeDislike->save();
    }

    
}
