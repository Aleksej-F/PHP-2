<section class="bredcrumb">
			<div class="wrap bredcrumb-wrap">
				<h2 class="bredcrumb-h2">New Arrivals</h2>
				<ul class="bredcrumb-nav">
					<li class="bredcrumb-nav-item"><a href="#" class="bredcrumb-nav-link">Home /</a></li>
					<li class="bredcrumb-nav-item"><a href="#" class="bredcrumb-nav-link">Men /</a></li>
					<li class="bredcrumb-nav-item"><a href="#" class="bredcrumb-nav-link bredcrumb-nav-link-active">new arrivals</a></li>
				</ul>
			</div>
	</section>
	



		<section class="checkout">
			<div class="wrap checkout_wrap">
				<div class="checkout_title">
					<h3 class="checkout__block-form-h3"><?=$text?></h3><Br><Br>
				</div>
				
				<?php
				
				if(isset($_SESSION['userRights']) && $_SESSION['userRights']==='admin'):?>
						<h1>Вы вошли с правами администратора!</h1>
						<div class="checkout_admin">
							<a href="index.php" id="сontСheckt">
								<div class="shopping-cart_button_5" onclick="сontinueСheckout()">
									<p>Catalog</p>
								</div>
							</a>

							<a href="#" id="сontСheckt">
								<div class="shopping-cart_button_5" onclick="сontinueСheckout()">
									<p>Orders</p>
								</div>
							</a>
							
							<a href="#" id="сontСheckt">
								<div class="shopping-cart_button_5" onclick="сontinueСheckout()">
									<p>users</p>
								</div>
							</a>

							<div class="shopping-cart_button_5" onclick="goOut()">
								<p>Go out</p>
							</div>
						</div>	
						
				<? elseif (isset($_SESSION['userRights']) && $_SESSION['userRights']==='user'): ?>
					<h1>Ваша учетная запись подтверждена!</h1>
					
						<div class="shopping-cart_button_5" onclick="goOut()">
							<p>Go out</p>
						</div>
						<a href="index.php?c=order&act=makingorder" >
							<div class="shopping-cart_button_5" onclick="">
								<p>Place an order</p>
							</div>
						</a>

				<? else:?>
					<details open>
						<summary class="shopping-cart_z">01.&nbsp;&nbsp;&nbsp;Shipping Adress</summary>
							<div class="checkout_summary_cont">
								<form name="test" method="post" id="formCheckout" onclick="сontinueСheckout()">
									<h3 class="shopping-cart_z_4">Check as a guest or register</h3>
									<b class="shopping-cart_z_5">Register with us for future convenience</b>
									<Br><Br>
									
										<div class="checkout_inp_cont">
											<input type="radio" name="reg" value="guest">
											<b class="shopping-cart_z_4 shopping-cart_z_6"> checkout as guest</b>
										</div>
										<div class="checkout_inp_cont">
											<input type="radio" name="reg" value="reg" checked="checked"> 
											<b class="shopping-cart_z_4 shopping-cart_z_6">register</b>
										</div>
									
									<Br>
									<h3 class="shopping-cart_z_4">register and save time!</h3>
									<b class="shopping-cart_z_5">Register with us for future convenience</b><Br><Br>
									<b class="shopping-cart_z_5"> <i class="fa fa-angle-double-right" aria-hidden="true"></i>Fast and easy checkout</b><Br>
									<b class="shopping-cart_z_5"> <i class="fa fa-angle-double-right" aria-hidden="true"></i>Easy access to your order history and status</b><Br>
									<a href="index.php?c=User&act=registr" id="сontСheckt">
										<div class="shopping-cart_button_5" >
											<p>Continue</p>
										</div>
									</a>
								</form>
								<form name="register" method="post">
									
									<input type="hidden" name="login" value="true">
									<h3 class="shopping-cart_z_4">Already registed?</h3>
									<b class="shopping-cart_z_5">Please log in below</b><Br><Br>
									<div class="checkout_inp_cont">
										<b class="shopping-cart_z_4 shopping-cart_z_6"> EMAIL ADDRESS</b>
										<b class="shopping-cart_z_4 shopping-cart_z_7">*</b>
									</div>
									<input type="email" class="email" name="email" placeholder="" required pattern="\S+@[a-z]+.[a-z]+" id="logMail">
									<div class="checkout_inp_cont">
										<b class="shopping-cart_z_4 shopping-cart_z_6">PASSWORD</b>
										<b class="shopping-cart_z_7">*</b>
									</div>
									<input class="email" type="password" name="pass" placeholder required id="logPass">
									
									<div class="checkout_inp_cont">
										<b class="shopping-cart_z_7 shopping-cart_z_8">* Required Fileds</b>
									</div>
									<p><?=$message?$message:"  ";?> </p>
									<div class="checkout_inp_forgot">
										
										<!--
											<div class="checkout_inp_forgot">
											<input class="shopping-cart_button_5" type="submit" value="Log in"/>
											</div>
											-->
											<div class="shopping-cart_button_5" onclick="logIn()">
												<p>Log in</p>
											</div>
											<a href="#" class="shopping-cart_z_9"><b >Forgot Password ?</b></a>
									</div>
									<div id="h1"></div>
								</form>
							</div>
					</details>
					<? endif; ?>	
			</div>
		</section>