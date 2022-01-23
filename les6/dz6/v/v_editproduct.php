<div class="details-product-cont-elem">
    <form method="post" enctype="multipart/form-data">    
        <div class="details-product-cont-elem-heder">
            <input class="product__edit-title" name="title" value="<?=$data['title']?>"/>
        </div>
        <div class="details-product-cont-elem-blok">
            <div class="product-cont-elem">
                        <img src="img/<?=$data['img']?>" alt="" width="260px">
                        <input type="hidden" id="imgProductEdit" value=<?=$data['img']?> />
                        <div class="product-cont-elem-text">
                            
                            $<input class="product-cont-img-p2" id="priceProductEdit" name="price" value="<?=$data['price']?>"/>.00
                        </div>
            </div>
            <div class="product-cont-elem details-col">
                <h2 > Описание </h2>
                <textarea class="product__edit-textarea" id="descriptionProductEdit" name="description"> <?=$data['description']?> </textarea>
            </div>
           

        </div>
        <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif" ></p>
        <?= $message? $message:'<br/>'?>
        <a href="index.php" >
            <p class="product-cont-img-p1"> Назад</p>
        </a>
            <input type="hidden" id="idProductEdit" name="id" value=<?=$data['id']?> />
            <input type="hidden"  name="c" value="product" />
            <input type="hidden"  name="act" value="saveEditProduct" />
            <input onclick="" value="Сохранить"  type="submit" name="submit" class="container-b"/>
    </form>
    


</div>

