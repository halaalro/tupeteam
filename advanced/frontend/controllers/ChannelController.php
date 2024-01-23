<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\User;
use common\models\Subscriber;

use common\models\VideoVieww;
use common\models\VideoLik;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/** Class ChannelController
 * @package frontend\controllers
  */
class ChannelController extends Controller
{
   
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
           
            'access'=>[
                'class'=>AccessControl::class,
                'only'=>['subscribe'],
                'rules'=>[[
                    'allow'=>true,
                    'roles'=>['@']
                     ]
                    
                   ]
                ]
             ];
                  
    }



    public function actionView($username)
    {   $this->layout='main';
        $channel=$this->findChannel($username);
        
      $dataProvider=new ActiveDataProvider([
        'query'=>Video::find()->creator($channel->id)->published()
      ]);
        return $this->render('view', [
            'channel' => $channel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSubscribe($username)
    {  
        $channel=$this->findChannel($username);
        $userId=\yii::$app->user->id;
        $subscriber= $channel->isSubscribed($userId);
        if(!$subscriber){


        $subscriber=new Subscriber();
        $subscriber->channel_id=$channel->id;
        $subscriber->user_id=$userId;
        $subscriber->save();
        // \Yii::$app->mailer->compose([
        //     'html'=>'subscriber-html','text'=>'subscriber-text'
        // ],[

        //     'channel'=>$channel,
        //     'user'=>\Yii::$app->user->identity
        // ])
        // ->setFrom(\Yii::$app->params['senderEmail'])
        // ->setTo($channel->email)
        // ->setSubject(subject:'you have new Subscribe ')
        // ->send();
        
        }else{
            $subscriber->delete();


        }
        return $this->renderAjax('_subscribe',[

            'channel'=>$channel
        ]);
       

        
        
      
       
    }









    protected function findChannel($username){
        $channel=User::findByUsername($username);
        if(!$channel){


            throw new NotFoundHttpException(message:"chaneel does not exit ");
        }
        return $channel;

    }

   













}



