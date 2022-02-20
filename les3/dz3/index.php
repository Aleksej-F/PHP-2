<?php

CONST PHOTO = 'big';
CONST PHOTO_SMALL = 'small';

// подгружаем и активируем авто-загрузчик Twig-а
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указываем где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('index.tmpl');
  
  // Получаем список фотографий 
  $photos_in_dir = array_slice(scandir(PHOTO), 2);

  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $template->render(array(
            'title' => 'Фотографии альбома',
            'path_to_photo_small' => PHOTO_SMALL,
            'photos' => $photos_in_dir
            ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>
