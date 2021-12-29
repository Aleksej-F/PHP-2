
<!-- 2. *Строить фотогалерею, не указывая статичные ссылки к файлам, 
а просто передавая в функцию построения адрес папки с изображениями. 
Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
 -->

<?php
             include "function.php";
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css" type="text/css" />
    <title>Document</title>
</head>
<body>
<div class="container">
    <?php
          echo smallImgLoad('small')  
        ?>
</div>
</body>
</html>

