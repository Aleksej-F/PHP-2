<?php
/**
 * Шаблон авторизации пользователя
 * ================
 * $text - текст статьи
 */
?>
<div class="checkout__head">
	<h1><?=$text?></h1>
</div>

<div class="checkout__block">
	<form name="avtoriz" method="post" class="checkout__block-form">
		<input type="hidden" name="avtoriz" value="true">
		<h3 class="checkout__block-form-h3">Пройдите регистрацию</h3>
		
		<div class="checkout_inp_cont">
				<b class="shopping-cart_z_4 shopping-cart_z_6">NAME</b>
			</div>
			<input class="email" name="name"  placeholder required >
		<Br>
			<div class="checkout_inp_cont">
				<b class="shopping-cart_z_4 shopping-cart_z_6">SURNAME</b>
			</div>
			<input class="email" name="surname"  placeholder required >
		<Br>
		<div class="checkout_inp_cont">
				<b class="shopping-cart_z_4 shopping-cart_z_6"> EMAIL ADDRESS</b>
			</div>
			<input type="email" name="email" class="email" placeholder="" required pattern="\S+@[a-z]+.[a-z]+" >
			<Br>
			<div class="checkout_inp_cont">
				<b class="shopping-cart_z_4 shopping-cart_z_6">PASSWORD</b>
			</div>
			<input class="email" name="pass" type="password" placeholder required >
		<Br>
		<input type="submit" value="Continue" class="checkout__block-form-button">
		
	</form>
	<form name="login" method="post" class="checkout__block-form">
			<input type="hidden" name="login" value="true">
			<h3 class="checkout__block-form-h3">Уже зарегистрирован?</h3>
			<b class="shopping-cart_z_5">Пожалуйста, авторизуйтесь.</b><Br><Br>
			<div class="checkout_inp_cont">
				<b class="shopping-cart_z_4 shopping-cart_z_6"> EMAIL ADDRESS</b>
			</div>
			<input type="email" name="email" class="email" placeholder="" required pattern="\S+@[a-z]+.[a-z]+" id="logMail">
			<div class="checkout_inp_cont">
				<b class="shopping-cart_z_4 shopping-cart_z_6">PASSWORD</b>
			</div>
			<input class="email" name="pass" type="password" placeholder required id="logPass">
			
			<div class="checkout_inp_forgot">
			
			<input type="submit" value="Log in" class="checkout__block-form-button">
			
			</div>
			
	</form>
</div>
