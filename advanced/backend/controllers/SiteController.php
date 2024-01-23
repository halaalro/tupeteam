<?php

namespace backend\controllers;
use common\models\VideoVieww;
use common\models\LoginForm;
use common\models\Subscriber;
use Yii;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use common\models\Video;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {  
         $user=Yii::$app->user->identity;
        $userId=$user->id;

        $lateestVideo=Video::find()
        ->latest()
        ->creator($userId)
        
       
        ->limit(1)
        ->one();

        $numberOfViews=VideoVieww::find()
        ->alias('vv')
        ->innerJoin(Video::tableName().'v','v.id= vv.video_id')
        ->andWhere(['v.creted_by'=>$userId])
        ->count();

        $numberOfSubscribers=$user->getSubscribe()->count();

        $subscribers=Subscriber::find()
        ->with('user')
        ->andWhere([

            'channel_id'=>$userId
        ])
        ->limit(3)
        ->orderBy('created_at Desc')
        ->all();


        
        return $this->render('index',[

            'lateestVideo'=>$lateestVideo,
            'numberOfViews'=>$numberOfViews,
            'numberOfSubscribers'=>$numberOfSubscribers,
            'subscribers'=>$subscribers,

        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
