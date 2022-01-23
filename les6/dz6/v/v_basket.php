<section class="shopping-cart">
		<div class="wrap shopping-cart_wrap">
			<div class="shopping-cart_grid">
				<h2>Product Details</h2>
				<p></p>
				<h2>unite Price</h2>
				<h2>Quantity</h2>
				<h2>shipping</h2>
				<h2>Subtota</h2>
				<h2>ACTION</h2>
			</div>
			<div class="shopping-cart_grid_separator"></div>
            
            <?php
			
					
                $total = 0;
					 
                if (isset($basket)) {
						
                  foreach ($basket as $reviews):?>

                <div class="shopping-cart_grid">
                    <img src="img/<?=$reviews['img']?>"  height="115px" alt="">
                    <div class="shopping-cart_grid_2">
                        <h3><?=$reviews['title']?></h3>
                        <div class="shopping-cart_grid_2-1">
                            <p class="shopping-cart_grid_2-1-1">Color:</p>
                            <p class="shopping-cart_grid_2-1-2">Red</p>
                        </div>
                        <div class="shopping-cart_grid_2-1">
                            <p class="shopping-cart_grid_2-1-1">Size:</p>
                            <p class="shopping-cart_grid_2-1-2">Xll</p>
                        </div>
                    </div>
                    <h3 class="shopping-cart_grid_3">$<?=$reviews['price']?></h3>
                    <input class="shopping-cart_grid_3 grid_3_1" 
                            placeholder="2" type="number" required min="0" max="100" 
                            value=<?=$reviews['count']?>
                            onChange="countBasket(<?=$reviews['id_product']?>, value)"
                            
                            >
                    <h3 class="shopping-cart_grid_3">FREE</h3>
                    <h3 class="shopping-cart_grid_3">$<?=$reviews['price']*$reviews['count']?></h3>
                    <i class="fa fa-times-circle cart_rov_col_4" aria-hidden="true" onclick="delProductBasket(<?=$reviews['id_product']?>)" ></i>
                </div>
                <div class="shopping-cart_grid_separator"></div>
                <?php  $total = $total + $reviews['price'] * $reviews['count'];?> 
			<?php endforeach;}?> 
				<h3 class="shopping-cart_z" id="baskettext"><?=$basketText?></h3>
				
            <div class="shopping-cart_button">
				<div class="shopping-cart_button_1" onclick="clearBasket()">
					<p>cLEAR SHOPPING CART</p>
				</div>
				<a href="index.php" >
                    <div class="shopping-cart_button_1" >
                        <p>cONTINUE sHOPPING</p>
                    </div>
                </a>
			</div>
			<div class="shopping-cart_form">
				<div class="shopping-cart_form_col">
					<h3 class="shopping-cart_z">Shipping Adress</h3>
					<input class="country" placeholder="Bangladesh" pattern="\S+[А-яа-я]">
					<input class="country" placeholder="State" pattern="\S+[А-яа-я]">
					<input class="country" placeholder="Postcode / Zip" pattern="\S+[А-яа-я]">
					<div class="shopping-cart_button_2" >
						<p>get a quote</p>
					</div>

				</div>
				<div class="shopping-cart_form_col">
					<h3 class="shopping-cart_z">coupon discount</h3>
					<h3 class="shopping-cart_z_1">Enter your coupon code if you have one</h3>
					<input class="country" placeholder="State" pattern="\S+[А-яа-я]">
					<div class="shopping-cart_button_3">
						<p>Apply coupon</p>
					</div>
				</div>
				<div class="shopping-cart_form_col shopping-cart_form_col_3">
					<h3 class="shopping-cart_z_2">Sub total         $<?=$total?></h3>
					<div class="grand_total">
						<h3 class="shopping-cart_z">GRAND TOTAL</h3>
						<h3 class="shopping-cart_z_3">$<?=$total?></h3>
					</div>
					<div class="shopping-cart_col_separator"></div>
					<a href="index.php?c=User&act=auth">
						<div class="shopping-cart_button_4">
							<p>proceed to checkout</p>
						</div>
					</a>
				</div>
			</div>
		</div>

	</section>