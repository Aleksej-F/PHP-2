<?php
/**
 * Шаблон профиля пользователя
 * ================
 */
?>
<div class="checkout__head">
	<h1><?=$text?></h1>
</div>

<div class="checkout__block">
	<form name="avtoriz" method="post" class="checkout__block-form">
		<input type="hidden" name="goout" value="true">
		<h3 class="checkout__block-form-h3"><?=$name?></h3>
		<Br>
      <div class="checkout_inp_cont">
				<b class="shopping-cart_z_4 shopping-cart_z_6"> EMAIL ADDRESS</b>
		</div>
		<!-- <input type="email" name="email" class="email" placeholder="" required pattern="\S+@[a-z]+.[a-z]+" id="logMail"> -->
		<div class="checkout_inp_cont">
			<b class="shopping-cart_z_4 shopping-cart_z_6">PASSWORD</b>
		</div>
		<!-- <input class="email" name="pass" type="password" placeholder required id="logPass"> -->
		<Br>
		<input type="submit" value="Go out" class="checkout__block-form-button">
		
	</form>
	
</div>