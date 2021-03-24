<?php

use yii\helpers\Url;

$this->title = "Корзина";
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Расчетный адрес</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="Имя">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Фамилия">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Адрес">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="Город">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Страна">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Телефон">
							</div>
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Создать аккаунт?
									</label>
									<div class="caption">
										<p>Добавьте пароль</p>
										<input class="input" type="password" name="password" placeholder="Введите пароль">
									</div>
								</div>
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Детали заказа"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Ваш заказ</h3>
						</div>
                        <?php if(count($prodArray) == 0): ?>
                            <p>В корзине нет товаров</p>
                        <?php else: $sum = 0;?>    
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>ТОВАР</strong></div>
                                    <div><strong>ИТОГО</strong></div>
                                </div>
                                <? foreach ($prodArray as $value): ?>
                                    <div class="order-products">
                                        <div class="order-col">
                                            <div><?php echo $value['count_cart'];?> <?php echo $value['name'];?></div>
                                            <div>$<?php $sum+=$value['price'] * $value['count_cart'];  
                                                        echo $value['price'] * $value['count_cart'];?>;</div>
                                        </div>
                                    </div>
                                <? endforeach;?>

                                <div class="order-col">
                                    <div>Доставка</div>
                                    <div><strong>БЕСПЛАТНО</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>ИТОГО</strong></div>
                                    <div><strong class="order-total">$<?php echo $sum;?></strong></div>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-1">
                                    <label for="payment-1">
                                        <span></span>
                                        Оплата картой 
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-2">
                                    <label for="payment-2">
                                        <span></span>
                                        Оплата наличными
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="terms">
                                <label for="terms">
                                    <span></span>
                                    Я прочитал(а) и принимаю <a href="#">условия договора</a>
                                </label>
                            </div>
                            <a href="#" class="primary-btn order-submit">Оформить заказ</a>
                        <?php endif;?>    
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
