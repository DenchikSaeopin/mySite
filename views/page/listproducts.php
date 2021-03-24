<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = "Electro | ".$categories['name'];
$this->params['breadcrumbs'][] = $categories['name'];

$this->registerMetaTag(['name' => 'keywords', 'content' => 'электроника']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'ноутбуки, планшеты']);
?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<!-- section title -->
						<div class="col-md-12">
							<div class="section-title">
								<h3 class="title"><?php echo $categories['name'];?></h3> 
							</div>
						</div>
					<!-- /section title -->

					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Цена</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Бренд</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										Samsung
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										Sony
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										Apple
										<small>(578)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Хиты продаж</h3>
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Смартфоны</p>
									<h3 class="product-name"><a href="#">укажите наименование товара</a></h3>
									<h4 class="product-price">укажите цену<del class="product-old-price">укажите цену</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Ноутбуки</p>
									<h3 class="product-name"><a href="#">укажите наименование товара</a></h3>
									<h4 class="product-price">укажите цену<del class="product-old-price">укажите цену</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Планшеты</p>
									<h3 class="product-name"><a href="#">укажите наименование товара</a></h3>
									<h4 class="product-price">укажите цену<del class="product-old-price">укажите цену</del></h4>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
                        <div class="store-filter clearfix">
							<div class="store-sort">
                                <!-- Фильтр созданый через YII2 -->
                                <?php $form = ActiveForm::begin(['enableClientScript' => false]);?> <!-- проверка на стороне клиента отключена (из-за ошибки jQuery) -->
                                <label><strong>Сортировка по: </strong><? echo $form->field($model, 'str')->
									dropDownList(['0' => 'Сначала подешевле', '1' => 'Сначала подороже', '2' => 'Популярности'], 
									$params = ['prompt' => '-']);?>								
								</label>
                                
								<label><strong>Показать:</strong> <? echo $form->field($model, 'number')->
									dropDownList(['12' => '12', '24' => '24', '48' => '48'], 
									$params = ['options' => ['12' => ['Selected' => true]]]);?>
								</label>
                                <? echo Html::submitButton('Показать');?>
                                <?php ActiveForm::end();?>
                            </div>
                                                   
                            <ul class="store-grid">                                         
                                <?php if($view == 1):?>
                                    <li class=""><a href="<?=Url::toRoute(['page/listproducts', 'id' => $categories['id']]);?>"><i class="fa fa-th"></i></a></li>
                                    <li class="active"><a href="<?=Url::toRoute(['page/listproducts', 'id' => $categories['id'], 'view' => '1']);?>"><i class="fa fa-th-list"></i></a></li>
                                <?php else:?>
                                    <li class="active"><a href="<?=Url::toRoute(['page/listproducts', 'id' => $categories['id']]);?>"><i class="fa fa-th"></i></a></li>
                                    <li class=""><a href="<?=Url::toRoute(['page/listproducts', 'id' => $categories['id'], 'view' => '1']);?>"><i class="fa fa-th-list"></i></a></li>
                                <?php endif;?>
                            </ul>
						</div>
						<!-- /store top filter -->
                        
                        <!-- СПИСОК ПРОДУКЦИИ -->
                        <div class="row">                
                            <!-- store products -->
                            <?php foreach ($products as $key => $product):?>                    
                                <?php if($view == 1):?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 view_list">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="./img/<?php echo $product['img'];?>" alt="">
                                                <div class="product-label">
                                                    <?php if($product['price_old'] != ""):?>	
                                                        <span class="sale">-<?php echo intval(100-$product['price']*100/$product['price_old']);?>%</span>
                                                    <?php endif;?>
                                                    <?php if($product['tag_new'] != ""):?>	
                                                        <span class="new">NEW</span>
                                                    <?php endif;?>   
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name">
                                                    <a href="<?=Url::toRoute(['page/cardprod', 'id' => $product['id']]);?>">
                                                        <?php echo $product['name'];?>
                                                    </a>
                                                </h3>
												<p><?php echo $product['description']?></p>
                                                <h4 class="product-price">$<?php echo $product['price'];?> 
                                                    <?php if($product['price_old'] != ""):?>
                                                        <del class="product-old-price">$<?php echo $product['price_old'];?></del>
                                                    <?php endif;?>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                        <button class="add-to-wishlist">
                                                            <i class="fa fa-heart-o"></i>                                           
                                                            <span class="tooltipp">В избранное</span>
                                                        </button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Сравнение</span></button>
                                                    
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a href="<?=Url::toRoute(['page/cart', 'id' => $product['id']]);?>">
													<button class="add-to-cart-btn">
														<i class="fa fa-shopping-cart"></i>В корзину
													</button>
                                                </a>
                                            </div>
                                        </div>            
                                    </div>    
                                <?php else:?>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/<?php echo $product['img'];?>" alt="">
                                                    <div class="product-label">
                                                        <?php if($product['price_old'] != ""):?>	
                                                            <span class="sale">-<?php echo intval(100-$product['price']*100/$product['price_old']);?>%</span>
                                                        <?php endif;?>
                                                        <?php if($product['tag_new'] != ""):?>	
                                                            <span class="new">NEW</span>
                                                        <?php endif;?>   
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name">
                                                        <a href="<?=Url::toRoute(['page/cardprod', 'id' => $product['id']]);?>">
                                                            <?php echo $product['name'];?>
                                                        </a>
                                                    </h3>
                                                    <h4 class="product-price">$<?php echo $product['price'];?> 
                                                        <?php if($product['price_old'] != ""):?>
                                                            <del class="product-old-price">$<?php echo $product['price_old'];?></del>
                                                        <?php endif;?>
                                                    </h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">                                                        
                                                            <button class="add-to-wishlist">
                                                                <i class="fa fa-heart-o"></i>                                           
                                                                <span class="tooltipp">В избранное</span>
                                                            </button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Сравнение</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="<?=Url::toRoute(['page/cart', 'id' => $product['id']]);?>">
														<button class="add-to-cart-btn">
															<i class="fa fa-shopping-cart"></i>В корзину
														</button>
                                                    </a>
                                                </div>
                                            </div>                     
                                    </div>        
                                <?php endif;?>
                            <?php endforeach;?> 
                        </div>
						<!-- /store products -->
					
						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<?php if(isset($count_pages) && $count_pages > 1){ ?>
								<ul class="store-pagination">									
									<?php for($i = 1; $i <= $count_pages; $i++) { ?>								
										<?php if((!isset($page) && $i == 1) || $page == $i) {?>
											<li class = "active"><span><?php echo $i;?></span></li>
										<?php }else{?>												
											<?php if(isset($_GET['view']) &&  $_GET['view'] == 1) {?>
												<li><a href="<?=Url::toRoute(['page/listproducts', 'id' => $id, 'page' => $i, 'view' => 1]);?>"><?php echo $i;?></a></li>
											<?php }else{?>			
												<li><a href="<?=Url::toRoute(['page/listproducts', 'id' => $id, 'page' => $i]);?>"><?php echo $i;?></a></li>
											<?php } ?>	
										<?php } ?>	
									<?php } ?>
								</ul>
							<?php }?> 
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

