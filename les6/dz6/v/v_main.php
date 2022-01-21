<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$title?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style_shop.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
	<link rel = "preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
	<script src="https://use.fontawesome.com/0c6c22b8c4.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="./sc.js"></script>
	<style>
   	@import "css/details.css" screen;
	 	@import "css/style.css" screen;
	 	
	
  	</style>
</head>
<body>
	<div id="header">
	<? include "v/v_header.php"; ?>
	</div>
	
	<div id="menu" class="menu">
		<div class="wrap_menu">

		
			<div class="menu_hed">
				<h1><?=$title?></h1>
			</div>
			<div>
				<a href="index.php">Главная</a> |
				<a href="index.php?c=basket&act=basket">Корзина</a> |
				<a href="index.php?c=User&act=auth">Профиль</a>
			</div>
		</div>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
	<? include "v/v_footer.php"; ?>
	</div>
</body>
</html>
