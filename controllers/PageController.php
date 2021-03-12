<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
// use app\models\LoginForm;
// use app\models\ContactForm;
use app\models\Categories;
use app\models\Products;

// Контроллер для страниц сайта
class PageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'only' => ['logout'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['logout'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'logout' => ['post'],
    //             ],
    //         ],
    //     ];
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function actions()
    // {
    //     return [
    //         'error' => [
    //             'class' => 'yii\web\ErrorAction',
    //         ],
    //         'captcha' => [
    //             'class' => 'yii\captcha\CaptchaAction',
    //             'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
    //         ],
    //     ];
    // }


    /**
        *Для страницы КАТАЛОГ
     */
    public function actionCatalog()
    {
        $categories = Categories::find()->asArray()->all();
        return $this->render('catalog', compact('categories'));
    }

    /**
        *Для страницы СПИСОК ТОВАРОВ
     */
    public function actionListproducts()
    {
        if(isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
         {
            $categories = Categories::find()->where(['id' => $_GET['id']])->asArray()->one();
         
            if(is_countable($categories)) 
            {
                $products = Products::find()->where(['category' => $_GET['id']])->asArray()->all();
                
                if(isset($_GET['view']) && $_GET['view'] == 1)
                    {
                        $view = 1;
                    }    
                else
                    {
                        $view = 0;
                    }            

                return $this->render('listproducts', compact('categories', 'products', 'view'));
            }
                        
        }
        return $this->redirect(['page/catalog']);       
    }

    /**
        *Для страницы КОНТАКТЫ
     */
    public function actionContacts()
    {
        return $this->render('contacts');
    }

    /**
        *Для страницы ВХОДА
     */
    public function actionLogin()
    {
        return $this->render('login');
    }

       /**
        *Для страницы РЕГИСТРАЦИИ
     */
    public function actionRegistration()
    {
        return $this->render('registration');
    } 

    /**
        *Для страницы ОБРАТНАЯ СВЯЗЬ
     */
    public function actionFormcontact()
    {
        return $this->render('formcontact');
    } 

    /**
        *Для страницы КАРТОЧКА ТОВАРА
     */
    public function actionCardprod()
    {
        return $this->render('cardprod');
    } 

    /**
        *Для страницы КОРЗИНА
     */
    public function actionCart()
    {
        return $this->render('cart');
    } 

    /**
        *Для страницы КОРЗИНА
     */
    public function actionListorder()
    {
        return $this->render('listorder');
    } 



//     /**
//      * Login action.
//      *
//      * @return Response|string
//      */
//     public function actionLogin()
//     {
//         if (!Yii::$app->user->isGuest) {
//             return $this->goHome();
//         }

//         $model = new LoginForm();
//         if ($model->load(Yii::$app->request->post()) && $model->login()) {
//             return $this->goBack();
//         }

//         $model->password = '';
//         return $this->render('login', [
//             'model' => $model,
//         ]);
//     }

//     /**
//      * Logout action.
//      *
//      * @return Response
//      */
//     public function actionLogout()
//     {
//         Yii::$app->user->logout();

//         return $this->goHome();
//     }

//     /**
//      * Displays contact page.
//      *
//      * @return Response|string
//      */
//     public function actionContact()
//     {
//         $model = new ContactForm();
//         if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//             Yii::$app->session->setFlash('contactFormSubmitted');

//             return $this->refresh();
//         }
//         return $this->render('contact', [
//             'model' => $model,
//         ]);
//     }

//     /**
//      * Displays about page.
//      *
//      * @return string
//      */
//     public function actionAbout()
//     {
//         return $this->render('about');
//     }
}