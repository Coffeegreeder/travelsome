<?php

namespace app\controllers;

use app\models\Places;
use Yii;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\UserOrders;
use app\models\UserOrdersSearch;

class SiteController extends Controller
{
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        $places = Places::find()->where(['place_status' => 0])->all();
        $counter = [
            Places::find()->where(['place_status' => 0])->andWhere(['place_category' => 'Одноместный'])->count(),
            Places::find()->where(['place_status' => 0])->andWhere(['place_category' => 'Двуместный'])->count(),
            Places::find()->where(['place_status' => 0])->andWhere(['place_category' => 'Люкс'])->count(),
            Places::find()->where(['place_status' => 0])->andWhere(['place_category' => 'Де-Люкс'])->count(),
            ];

        return $this->render('index', [
            'places' => $places,
            'counter' => $counter,
        ]);
    }

    /**
     * Displays a single UserOrders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserOrders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserOrders();

        if($model->customer_name = Yii::$app->user->identity->username && $model->customer_email = Yii::$app->user->identity->email){
            $dataProvider = 1;
        }


        //$model->place_status = 1;
        if($model->departure_date >= date('Y-m-d h:i:s')){

        }

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        }
//        var_dump($model);
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserOrders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionOrders(){
        $orders = UserOrders::find()->where(['customer_name' => Yii::$app->user->identity->username])->all();

        return $this->render('user_orders', [
            'orders' => $orders,
        ]);
    }

    /**
     * Deletes an existing UserOrders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionRegister()
    {

       $model = new RegisterForm();
       if ($model->load(Yii::$app->request->post()) && $model->signup()) {
           return $this->render('index');
       }

       return $this->render('register', [
           'model' => $model,
       ]);
     }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('index?r=site/index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index?r=site/index');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Finds the UserOrders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserOrders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserOrders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена');
    }
}
