<?php
/**
 * Шаблон страницы просмотра заказов для админа
 * ================
 */
?>
<section class="shopping-cart">
		<div class="wrap shopping-cart_wrap">
			<div class="shopping-cart_grid">
				<h2>№ п/п</h2>
				
				<h2>user</h2>
				<h2>order number</h2>
				<h2>status</h2>
				<h2>delivery address</h2>
				<h2>ACTION</h2>
			</div>
			<div class="shopping-cart_grid_separator"></div>
            
            <?php
			
					
               
					 
                if (isset($orders)) {
						
                  foreach ($orders as $reviews):?>

                <div class="shopping-cart_grid">
                    
                    
                    <h3 class="shopping-cart_grid_3"><?=$reviews['id']?></h3>
                    <h3 class="shopping-cart_grid_3"><?=$reviews['name']." ".$reviews['surname']?></h3>
                    <h3 class="shopping-cart_grid_3"><?=$reviews['order_number']?></h3>
                    <h3 class="shopping-cart_grid_3"><?=$reviews['status']?></h3>
                    <h3 class="shopping-cart_grid_3"><?="г. ".$reviews['city']." ул.".$reviews['street']." д.".$reviews['street']." кв.".$reviews['flat']?></h3>
                    <i class="fa fa-times-circle cart_rov_col_4" aria-hidden="true" onclick="del(<?=$reviews['id_product']?>)" ></i>
                </div>
                <div class="shopping-cart_grid_separator"></div>
               
			<?php endforeach;}?> 
      </div>
		</section>