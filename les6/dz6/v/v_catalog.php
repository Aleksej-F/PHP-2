<?php
/**
 * Шаблон каталога
 * ================
 */
?>

	
<section class="product">
   <h2 class="product-p1">Fetured Items</h2>
	<p class="product-p2">Shop for items based on what we featured in this week</p>
	<div class="product-cont">
		<?php
			if (isset($catalog)) {
            foreach ($catalog as $data) :?>
           
           		<div class="product-cont-elem">
					<img src="img/<?=$data['img']?>" alt="">
					<div class="product-cont-elem-img">
						<div class="product-cont-elem-img-1" onclick="basket(<?=$data['id']?>)">
							<img src="img/forma_1_copy_1287.png" alt="">
							<p>Add to Cart</p>
						</div>
					</div>
					<div class="product-cont-elem-text">
						<a href="details.php?action=count&img=<?=$data['img']?>&id=<?=$data['id']?>" class="product-cont-elem-text-a">
							<p class="product-cont-img-p1"><?=$data['title']?></p>
						</a>
						<div class="product-cont-elem-text-admin">
							<p class="product-cont-img-p2">$<?=$data['price']?>.00</p>
							<? if (isset($_SESSION['userRights']) && $_SESSION['userRights']==='admin'): ?>
								<a href="editproduct.php?action=editproduct&id=<?=$data['id']?>">
									<div class="product-cont-elem-text-admin-a">
										<p >Edit</p>
									</div>
								</a>
							<? endif; ?>	
						</div>
						
					</div>
				</div>
		<?php endforeach;}?>
			
			
			
					<a href="#" class="button">
							Browse All Product
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</a>
				
	</div>
</section>