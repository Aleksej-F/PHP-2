<section class="checkout">
		<div class="wrap checkout_wrap">
		<?		
        if (isset($_SESSION['userRights']) && $_SESSION['userRights']!=='guest' ) {?>
            <h1 class="shopping-cart_z_4">You have already logged in.</h1><Br><Br>
			<? } else { ?>
			<details open> 
				<summary class="shopping-cart_z">Register with us for future convenience</summary>
                  <Br>
	               <h3 class="checkout__block-form-h3"><?=$name?></h3>
               <div class="checkout_summary_cont">
						
						<form name="avtoriz"  method="post" enctype="multipart/form-data" >
                     <input type="hidden" name="registr" value="true">
                     <h3 class="shopping-cart_z_4">Please fill in the fields below</h3><Br><Br>
							
							<div class="checkout_inp_cont">
								<b class="shopping-cart_z_4 shopping-cart_z_6">NAME</b>
								<b class="shopping-cart_z_7">*</b>
							</div>
							<input class="email" name="name" type="text" placeholder="" required value=<?=$_POST['name']?$_POST['name']:"";?>>
							
							<div class="checkout_inp_cont">
								<b class="shopping-cart_z_4 shopping-cart_z_6">SURNAME</b>
								<b class="shopping-cart_z_7">*</b>
							</div>
							<input class="email" name="surname" type="text" placeholder="" required value=<?=$_POST['surname']?$_POST['surname']:"";?>>
							
							<div class="checkout_inp_cont">
								<b class="shopping-cart_z_4 shopping-cart_z_6">TELEPHONE</b>
								<b class="shopping-cart_z_7">*</b>
							</div>
							<input class="email" name="phone" type="" placeholder="" required value=<?=$_POST['phone']?$_POST['phone']:"";?>>
							
							<div class="checkout_inp_cont">
								<b class="shopping-cart_z_4 shopping-cart_z_6"> EMAIL ADDRESS</b>
								<b class="shopping-cart_z_7">*</b>
							</div>
							<div class="checkout_inp_cont_help">
								<input type="email" name="email" class="email" placeholder="" required pattern="\S+@[a-z]+.[a-z]+" value=<?=$_POST['email']?$_POST['email']:"";?>>
								<div class="checkout_inp_cont_help_modal">
									<p><?=$message?$message:"";?> </p>
									</div>
							</div>
							
							<div class="checkout_inp_cont">
								<b class="shopping-cart_z_4 shopping-cart_z_6">PASSWORD</b>
								<b class="shopping-cart_z_7">*</b>
							</div>
							<input class="email" name="pass" type="password" placeholder="" required value=<?=$_POST['pass']?$_POST['pass']:"";?>>
							
							<div class="checkout_inp_cont">
								<b class="shopping-cart_z_7 shopping-cart_z_8">* Required Fileds</b>
							</div>
							<div class="checkout_inp_cont_bloc_nav">
								<div class="checkout_inp_forgot">
									<input class="shopping-cart_button_5" type="submit" value="Register"/>
								</div>
								<a href="index.php?c=User&act=auth" >
									<div class="shopping-cart_button_5" >
										<p>Log in</p>
									</div>
								</a>
							</div>
						</form>

					</div>
			</details>
		<? } ?>
		</div>

	</section>