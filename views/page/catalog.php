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