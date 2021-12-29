<?php

CONST PHOTO = 'big';
CONST PHOTO_SMALL = 'small';

// подгружаем и активируем авто-загрузчик Twig-а
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('fullimage.tmpl');
  
  $photo = stripcslashes($_GET['photo']);
  if (!file_exists(PHOTO . '/' .$photo)) throw new Exception ('Фото отсутсвует');
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $template->render(array(
            
            'path_to_photo' => PHOTO,
            'photo' => $photo
            ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>