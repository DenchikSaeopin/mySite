<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Electro - магазин электроники';
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
								<label>
									Сортировать по:
									<select class="input-select">
										<option value="0">Популярности</option>
										<option value="1">Цене</option>
									</select>
								</label>

								<label>
									Показать по:
									<select class="input-select">
										<option value="0">10</option>
										<option value="1">20</option>
									</select>
								</label>
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
                                                    <!-- <a href="<?=Url::toRoute(['page/listorder', 'id' => $product['id']]);?>" class="add-to-wishlist">  -->
                                                        <button class="add-to-wishlist">
                                                            <i class="fa fa-heart-o"></i>                                           
                                                            <span class="tooltipp">В избранное</span>
                                                        </button>
                                                    <!-- </a> -->
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Сравнение</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Быстрый просмотр</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a href="<?=Url::toRoute(['page/cart', 'id' => $product['id']]);?>">
                                                <button class="add-to-cart-btn">
                                                    <i class="fa fa-shopping-cart"></i>В корзину
                                                </button>
                                                <a>
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
                                                        <!-- <a href="<?=Url::toRoute(['page/listorder', 'id' => $product['id']]);?>" class="add-to-wishlist">  -->
                                                            <button class="add-to-wishlist">
                                                                <i class="fa fa-heart-o"></i>                                           
                                                                <span class="tooltipp">В избранное</span>
                                                            </button>
                                                        <!-- </a> -->
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Сравнение</span></button>
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Быстрый просмотр</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="<?=Url::toRoute(['page/cart', 'id' => $product['id']]);?>">
                                                    <button class="add-to-cart-btn">
                                                        <i class="fa fa-shopping-cart"></i>В корзину
                                                    </button>
                                                    <a>
                                                </div>
                                            </div>                     
                                    </div>        
                                <?php endif;?>
                            <?php endforeach;?> 
                        </div>
						<!-- /store products -->
					
						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
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

