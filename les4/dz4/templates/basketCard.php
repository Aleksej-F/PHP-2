<?php
    session_start();
        
    if (isset($_GET['del'])){
        include "../config/config.php";
    } else {
        include "./config/config.php";
    }
        
    $idUser = $_SESSION['userId']? $_SESSION['userId']:0;
    $sql = "SELECT basket.id_product, basket.count, product.description, product.price, product.img, product.title FROM `basket`JOIN `product` ON basket.id_product = product.id WHERE basket.id_user = $idUser;";
    $res = mysqli_query($connect,$sql);
    $total = 0;
?>

<?php while($reviews = mysqli_fetch_assoc($res)):?>
            <div class="cart_rov">
                <img src="img/<?=$reviews['img']?>" class="cart_rov_img" alt="">
                <div class="cart_rov_col">
                    <p class="cart_rov_col_1"> <?=$reviews['title']?></p>
                    <p class="cart_rov_col_2">
                        <i class="fa fa-star " aria-hidden="true"></i>
                        <i class="fa fa-star " aria-hidden="true"></i>
                        <i class="fa fa-star " aria-hidden="true"></i>
                        <i class="fa fa-star " aria-hidden="true"></i>
                        <i class="fa fa-star-half-o " aria-hidden="true"></i>
                    </p>
                    <p class="cart_rov_col_3 "> <?=$reviews['count']?>&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;$ <?=$reviews['price']?></p>
                </div>
                <i class="fa fa-times-circle cart_rov_col_4" aria-hidden="true" onclick="delProductBasketMini(<?=$reviews['id_product']?>)"></i>
            </div>
            <div class="cart_rov_separator"></div>
            <?php  $total = $total + $reviews['price'] * $reviews['count'];?>  
<?php endwhile;?> 

