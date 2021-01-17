<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Projects;
use app\models\ImgRender;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\ArrayHelper;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $projects = new Projects();
        $model = $projects->getProjects();
        $model = array_slice($model, 0,8);
        return $this->render('index',['projects'=>$model]);
    }

    public function actionProjects()
    {
        $projects = new Projects();
        $model = $projects->getProjects();
        return $this->render('projects',['projects'=>$model]);
    }

    public function actionConsulting()
    {
        return $this->render('consulting');
    }

    public function actionPrices()
    {
        return $this->render('prices');
    }
    public function actionProjectView($id)
    {
        $project = Projects::findOne($id);
        $img = ImgRender::find()->where(['idref'=>$project->id])->all();
        Yii::$app->view->registerMetaTag(['name' => 'description','content' => $project->descr_prj]);
        Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => $project->keyword_prj]);
        return $this->render('project-view',['project'=>$project,'img'=>$img]);
    }

    public function actionProjectSave()
    {
        Yii::$app->view->registerMetaTag(['name' => 'robots','content' => 'noindex']);
        
        if (Yii::$app->user->isGuest) {
            return $this->redirect('login');
        }
        $id = null;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        return $this->render('project-save',['id'=>$id]);
    }

     public function actionProjectsList()
    {
        Yii::$app->view->registerMetaTag(['name' => 'robots','content' => 'noindex']);
        if (Yii::$app->user->isGuest) {
            return $this->redirect('login');
        }
        $project = Projects::find()->all();
        $img = ImgRender::find()->all();
        $arr_img = [];
        foreach ($img as $key => $value) {
            if(empty($arr_img[$value->idref])){
               $arr_img[$value->idref] = $value->img;
            }
        }
        return $this->render('projects-list',['project'=>$project,'imgs'=>$arr_img]);
    }

    public function actionSave()
    {
        //echo "string";
        //return true;
        // if (Yii::$app->request->isAjax) {
        //     $data = Yii::$app->request->post();
        //     //data: { 'save_id' : fileid },
        //     $mySaveId =  $data['save_id'];
        //     echo $mySaveId;
        //     // your logic;
        // }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
        //    return $this->goHome();
            $this->redirect('projects-list');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('projects-list');
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        return $this->render('contact');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

}
