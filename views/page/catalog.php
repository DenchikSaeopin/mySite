<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Главная';
?>

<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<!-- shop -->
					
                    <?php foreach ($categories as $key => $category):?> 
                        <div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/<?php echo $category['img'];?>" alt="">
							</div>
							<div class="shop-body">
								<h3>Коллекция<br>товаров</h3>
								<a href="<?=Url::toRoute(['page/listproducts', 'id' => $category['id']]);?>" class="cta-btn"><?php echo $category['name'];?> <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
                    <?php endforeach;?>                   
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Дня</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Часов</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Минуты</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Секунд</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Предложения недели</h2>
							<p>Скидка до 50%!</p>
							<a class="primary-btn cta-btn" href="#">Купить сейчас</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->