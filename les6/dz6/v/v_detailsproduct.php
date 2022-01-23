
<div class="details-product-cont-elem">
    <div class="details-product-cont-elem-heder">
        <h1 ><?=$data['title']?></h1>
    </div>
    <div class="details-product-cont-elem-blok">
        <div class="product-cont-elem">
					<img src="img/<?=$data['img']?>" alt="" >
					<div class="product-cont-elem-img">
						<div  class="product-cont-elem-img-1" onclick="basket(<?=$data['id']?>)" >
							<img src="img/forma_1_copy_1287.png" alt="">
							<p>Add to Cart</p>
						</div>
					</div>
					<div class="product-cont-elem-text">
						
						<p class="product-cont-img-p2">$<?=$data['price']?>.00</p>
					</div>
        </div>
        <div class="product-cont-elem details-col">
            <h2 > Описание </h2>
            <p class="details-p1" align="justify"> <?=$data['description']?> </p>
        </div>
    </div>
    <a href="index.php" >
        <p class="product-cont-img-p1"> Назад</p>
    </a>
   


</div>