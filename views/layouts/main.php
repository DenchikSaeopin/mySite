<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- HEADER -->
<header>
				<!-- TOP HEADER -->
				<div id="top-header">
					<div class="container">
						<ul class="header-links pull-left">
							<li><a href="#"><i class="fa fa-phone"></i> +714-88-51-84</a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i> electro@mail.com</a></li>
							<li><a href="#"><i class="fa fa-map-marker"></i> ул. Оптиков, 4 </a></li>
						</ul>
						<ul class="header-links pull-right">
							<!-- <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> -->
							<li><a href="#"><i class="fa fa-user-o"></i> Личный кабинет</a></li>
							<li><a href="<?=Url::toRoute('page/login');?>">Войти</a></li>
						</ul>
					</div>
				</div>
				<!-- /TOP HEADER -->

				<!-- MAIN HEADER -->
				<div id="header">
					<!-- container -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<!-- LOGO -->
							<div class="col-md-3">
								<div class="header-logo">
									<a href="#" class="logo">
										<img src="./img/logo.png" alt="">
									</a>
								</div>
							</div>
							<!-- /LOGO -->

							<!-- SEARCH BAR -->
							<div class="col-md-6">
								<div class="header-search">
									<form>
										<!-- <select class="input-select">
											<option value="0">All Categories</option>
											<option value="1">Category 01</option>
											<option value="1">Category 02</option>
										</select> -->
										<input class="input" placeholder="Поиск">
										<button class="search-btn">Найти</button>
									</form>
								</div>
							</div>
							<!-- /SEARCH BAR -->

							<!-- ACCOUNT -->
							<div class="col-md-3 clearfix">
								<div class="header-ctn">
									<!-- Wishlist -->
									<div>
										<a href="#">
											<i class="fa fa-heart-o"></i>
											<span>Избранное</span>
											<!-- <div class="qty">2</div> -->
										</a>
									</div>
									<!-- /Wishlist -->

									<!-- Cart -->
									<div class="dropdown">
										<a href="#">
											<i class="fa fa-shopping-cart"></i>
											<span>Корзина</span>
											<!-- <div class="qty">3</div> -->
										</a>
									</div>
									<!-- /Cart -->

									<!-- Menu Toogle -->
									<div class="menu-toggle">
										<a href="#">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-nav-collapse">
                                            <i class="fa fa-bars"></i>
                                            <span>Меню</span>     
                                            </button>
										</a>
									</div>
									<!-- /Menu Toogle -->
								</div>
							</div>
							<!-- /ACCOUNT -->
						</div>
						<!-- row -->
					</div>
					<!-- container -->
				</div>
				<!-- /MAIN HEADER -->
			</header>
			<!-- /HEADER -->

			<!-- NAVIGATION -->

            <?php
            NavBar::begin([
                // 'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => ' ',
                    'id' => 'responsive-nav',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'main-nav nav navbar-nav'],
                'items' => [
                    ['label' => 'На главную', 'url' => ['/page/catalog']],
                    ['label' => 'Список товаров', 'url' => ['/page/listproducts']],
                    ['label' => 'Контакты', 'url' => ['/page/contacts']],
                    // Yii::$app->user->isGuest ? (
                    //     ['label' => 'Login', 'url' => ['/site/login']]
                    // ) : (
                    //     '<li>'
                    //     . Html::beginForm(['/site/logout'], 'post')
                    //     . Html::submitButton(
                    //         'Logout (' . Yii::$app->user->identity->username . ')',
                    //         ['class' => 'btn btn-link logout']
                    //     )
                    //     . Html::endForm()
                    //     . '</li>'
                    // )
                ],
            ]);
            NavBar::end();
            ?>    


				<!-- container -->   
				<!-- <div class="container"> -->
					<!-- responsive-nav -->
					<!-- <div id="responsive-nav"> -->
						<!-- NAV -->
						<!-- <ul class="main-nav nav navbar-nav"> -->
							<!-- <li><a href="#">Планшеты</a></li>
							<li><a href="#">Смартфоны</a></li>
							<li><a href="#">Камеры</a></li>
							<li><a href="#">Ноутбуки</a></li> -->
						<!-- </ul> -->
						<!-- /NAV -->
					<!-- </div>            -->
					<!-- /responsive-nav -->
				<!-- </div> -->
				<!-- /container -->

			<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">ХЛЕБНЫЕ</a></li>
							<li><a href="#">КРОШКИ</a></li>
							<li><a href="#">КРОШКИ</a></li>
							<li class="active">КРОШКИ (227,490 Results)</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- LISTPRODUCT -->
		<?=$content;?>


		<!-- FOOTER -->
		<footer id="footer">
			<!-- NEWSLETTER -->
			<div id="newsletter" class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="newsletter">
								<p>Подписываетесь на рассылку</p>
								<form>
									<input class="input" type="email" placeholder="Введите Ваш Email">
									<button class="newsletter-btn"><i class="fa fa-envelope"></i>Подписаться</button>
								</form>
								<ul class="newsletter-follow">
									<li>
										<a href="#"><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-twitter"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-instagram"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-pinterest"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /NEWSLETTER -->
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">О нас</h3>
								<p>Официальной дистербьютер цифровой и электронной техники.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>ул. Оптиков, 4 </a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+714-88-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>electro@mail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Информация</h3>
								<ul class="footer-links">
									<li><a href="#">О нас</a></li>
									<li><a href="#">Свяжитесь с нами</a></li>
									<li><a href="#">Политика приватности</a></li>
									<li><a href="#">Правила и условия</a></li>
								</ul>
							</div>
						</div>

					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->





    <?php
    /*
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    */
    ?>

        <?/*= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) */?>
        <?//= Alert::widget() ?>
        <?//= $content ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
