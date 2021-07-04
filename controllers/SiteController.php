<?php

namespace app\controllers;

use app\models\Places;
use phpDocumentor\Reflection\Types\Null_;
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
     * Updates an existing UserOrders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) // Экшен на обновление данных брони
    {
        $model = $this->findModel($id);

        if(Yii::$app->user->isGuest){
            $this->redirect(['register']);
        }

        $model->customer_name = Yii::$app->user->identity->username;
        $model->customer_email = Yii::$app->user->identity->email;
        $model->place_status = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['orders']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionOrders(){ // Экшен на вывод брони
        $orders = Places::find()->where(['customer_name' => Yii::$app->user->identity->username])->all(); // (записи, у которых имя бронирующего совпадает с текущим пользователем)

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

    // отмена брони
    public function actionDelete($id)
    {
        $model =  $this->findModel($id);

        $model->customer_name = null;
        $model->customer_email = null;
        $model->arrival_date = null;
        $model->departure_date = null;
        $model->place_status = 0;

        $model->load(Yii::$app->request->post());
        $model->save(false);

        return $this->redirect(['index']);
    }

    // Регистрация
    public function actionRegister()
    {
       $model = new RegisterForm();
       if ($model->load(Yii::$app->request->post()) && $model->signup()) {
           return $this->redirect(['index']);
       }

       return $this->render('register', [
           'model' => $model,
       ]);
     }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index');
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
        if (($model = Places::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена');
    }
}
