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
use app\models\SortForm;
use yii\web\NotAcceptableHttpException;

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
        if(isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
            $id = $_GET['id']; // id категории
            
            $categories = Categories::find()->where(['id' => $id])->asArray()->one();
          
            if(is_countable($categories)) {
                
                $model = new SortForm();

                $count_product = count(Products::find()->where(['category' => $id])->asArray()->all()); //подсчет числа товаров

                $page = 1; // номер стр по умолчанию
                $str = null; // принимает значение нужное для сортировки
                $number = 12; //значение по умолчанию 

                if(isset($_GET['page']) && $_GET['page'] != "" && filter_var($_GET['page'], FILTER_VALIDATE_INT)){
                    $page = $_GET['page'];
                } 
                               
                //Обработчик для формы сортировки и вывода числа товаров на странице   
                if($model->load(Yii::$app->request->post()) && $model->validate()) {
                    
                    if(isset($model->number) && !empty($model->number)){
                        $number = $model->number;
                    }

                    if(isset($model->str)){
                        switch($model->str){
                            case 0:
                                $products = $this->selectListProd($id, ['price' => SORT_ASC], $number, $page);
                                break;
                            case 1:
                                $products = $this->selectListProd($id, ['price' => SORT_DESC], $number, $page);
                                break;
                            case 2:
                                // сортировка по рейтингу
                                break;
                            default:
                                $products = $this->selectListProd($id, ['id' => SORT_ASC], $number, $page);
                                break;
                        }
                    }else{
                        $products = $this->selectListProd($id, ['id' => SORT_ASC], $number, $page);
                    }                              
                }else{
                    $products = $this->selectListProd($id, ['id' => SORT_ASC], $number, $page);                    
                }
                
                $count_pages = ceil($count_product / $number ); // кол-во странц для пагинации

                // функция selectListProd
                if(isset($_GET['view']) && $_GET['view'] == 1){
                        $view = 1;
                }else{
                        $view = 0;
                }            
                return $this->render('listproducts', compact('categories', 'products', 'view', 'model', 'count_pages', 'id', 'page'));
            }
                        
        }
        return $this->redirect(['page/catalog']);       
    }

    private function selectListProd($id, $field_sort, $limit, $start){
        if($start == 1){
            $start = 0;
        } else {
            $start = ($start - 1) * $limit;
        }
            return Products::find()->where(['category' => $id])->asArray()->orderBy($field_sort)->limit($limit)->offset($start)->all();
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
        if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = $_GET['id'];
        }else {
            throw new NotAcceptableHttpException;
        }
        
        $products = Products::find()->with('categories')->where(['id' => $id])->asArray()->one();

        if(!is_array($products) || !is_countable($products)){
            throw new NotAcceptableHttpException; 
        }
               
        return $this->render('cardprod', compact('products','id'));
    } 

    /**
        *Для страницы КОРЗИНА
     */
    public function actionCart()
    {
        $session = Yii::$app->session; // инициализация сессии
        //$session->destroy();
        $session->open(); // открытие сессии

        if($session->has('productsSession')) {
           $productsSession = $session->get('productsSession');
        } else{
            $productsSession = array();
        }
        
        if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
            $productsArray = Products::find()->where(['id' => $_GET['id']])->asArray()->one();
            
            if(is_array($productsArray) && !empty($productsArray)) {
                $flag = false;
                for ($i = 0; $i < count($productsSession); $i++) {
                    if($productsSession[$i]['id'] == $_GET['id']) {
                        $flag = true; // выполнился ли проход по циклу
                        if($productsArray['count'] >= $productsSession[$i]['count'] + 1) {
                            $productsSession[$i]['count']++;
                        }
                        break;
                    }
                }
                if(!$flag) {
                    array_push($productsSession, ['id' => $_GET['id'], 'count' => 1]);
                }
            }
        }
        
        $session->set('productsSession', $productsSession);
        $productsSession = $session->get('productsSession');

        $arrayID = array();

        foreach ($productsSession as $value) {
            array_push($arrayID, $value['id']);
        }

        $prodArray = Products::find()->where(['id' => $arrayID])->asArray()->All();

        foreach($prodArray as $key => $value) {
            $prodArray[$key]['count_cart'] = $productsSession[$key]['count'];
        }

        
        return $this->render('cart', compact('prodArray'));
    } 

    /**
        *Для страницы ЗАКАЗ
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