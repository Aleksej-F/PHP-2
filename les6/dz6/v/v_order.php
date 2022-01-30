<?php
/**
 * Шаблон страницы оформления заказа
 * ================
 */
?>
<section class="checkout">
	<div class="wrap checkout_wrap">
		<h3 class="shopping-cart_z"><?=$name?></h3>
			 <Br> <Br>
	 	<div class="checkout_summary_cont">
			 
		 	<form name="order"  method="post" enctype="multipart/form-data" >
           
				
            <input type="hidden" name="registr" value="true">
            <h3 class="shopping-cart_z_4">Please fill in the fields below</h3><Br><Br>
				<div class="checkout_inp_cont">
					<b class="shopping-cart_z_4 shopping-cart_z_6">city</b>
					<b class="shopping-cart_z_7">*</b>
				</div>
				<input class="email" name="city" type="text" placeholder="" required value=<?=$_POST['city']?$_POST['city']:"";?>>
				<div class="checkout_inp_cont">
					<b class="shopping-cart_z_4 shopping-cart_z_6">street</b>
					<b class="shopping-cart_z_7">*</b>
				</div>
				<input class="email" name="street" type="text" placeholder="" required value=<?=$_POST['street']?$_POST['street']:"";?>>
				<div class="checkout_inp_cont">
					<b class="shopping-cart_z_4 shopping-cart_z_6">house</b>
					<b class="shopping-cart_z_7">*</b>
				</div>
				<input class="email" name="house" type="" placeholder="" required value=<?=$_POST['house']?$_POST['house']:"";?>>
				<div class="checkout_inp_cont">
					<b class="shopping-cart_z_4 shopping-cart_z_6"> flat</b>
					<b class="shopping-cart_z_7">*</b>
				</div>
				<div class="checkout_inp_cont_help">
					<input type="number" name="flat" class="email" placeholder="" required pattern="" value=<?=$_POST['flat']?$_POST['flat']:"";?>>
					<div class="checkout_inp_cont_help_modal">
						<p><?=$message?$message:"";?> </p>
					</div>
				</div>
				<div class="checkout_inp_cont">
					<b class="shopping-cart_z_4 shopping-cart_z_6">payment method</b>
					<b class="shopping-cart_z_7">*</b>
				</div>
				<input class="email" name="paymentmethod" type="text" placeholder="" required value=<?=$_POST['paymentmethod']?$_POST['paymentmethod']:"";?>>
							
				<div class="checkout_inp_cont">
					<b class="shopping-cart_z_7 shopping-cart_z_8">* Required Fileds</b>
				</div>
				<div class="checkout_inp_cont_bloc_nav">
					<div class="checkout_inp_forgot">
						<input class="shopping-cart_button_5 but" type="submit" value="FINISH"/>
					</div>
					<input type="hidden"  name="c" value="order" />
            	<input type="hidden"  name="act" value="finishOrder" />	

					<?php if (!isset($_SESSION['userRights']) || $_SESSION['userRights']=='guest') :?>
						<div class="checkout_inp_cont_bloc_nav">
							<a href="index.php?c=User&act=registr">
								<div class="shopping-cart_button_5">
									<p>registr</p>
								</div>
							</a>
							<a href="index.php?c=User&act=auth" >
								<div class="shopping-cart_button_5">
									<p>Log in</p>
								</div>
							</a>
						</div>
					<?php endif;?>
				</div>
			</form>
      </div>
	</div>
</section>