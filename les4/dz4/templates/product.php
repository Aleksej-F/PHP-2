<?php
   session_start();
        
   if (isset($_GET['view'])){
        include "../config/config.php";
   } else {
        include "./config/config.php";
   }
  
   $id = $_GET['id'] or 0;  
   
   $sql = "select * from product where id>'$id' LIMIT 2";
	$res = mysqli_query($connect,$sql);
?>

			<h2 class="product-p1">Fetured Items</h2>
			<p class="product-p2">Shop for items based on what we featured in this week</p>
			<div class="product-cont">
			
				<?php
				$dataId = 0;					
				while($data = mysqli_fetch_assoc($res)):?>
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
											<p>Edit</p>
										</div>
									</a>
								<? endif; ?>	
							</div>
						</div>
					</div>
				<?php 
         $dataId = $data['id'];
         endwhile;?>
				
			</div>
			<div class="button" onclick="viewMore(<?=$dataId?>)">
				View more
				<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
			</div>
		