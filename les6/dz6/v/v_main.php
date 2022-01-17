<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" /> 
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="./sc.js"></script>
	<style>
    @import "css/style_shop.css" screen; /* Стиль для вывода результата на монитор */
	 @import "css/details.css" screen;
  </style>
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Главная</a> |
		<a href="index.php?c=basket&act=basket">Корзина</a> |
      <a href="index.php?c=User&act=auth">Профиль</a>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Все права защищены. Адрес. Телефон.
	</div>
</body>
</html>
