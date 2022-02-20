<?
session_start();
//include_once("config/config.php");



class M_Product {
    private $config;

    public function __construct(){
        $this->config = new K_Config();
    }
    // выборка товара по id
    function product($id) {
        $sql="SELECT * FROM `product` WHERE `id`=$id";
      
        $connect = $this->config->connectingPDO();
        $prod = $connect->query($sql)->fetch();
        return $prod;
    }
    //сохранение изменений информации о товаре
    function saveEditProduct(){
        $connect = $this->config->connectingPDO();
        $idProduct = trim(strip_tags($_POST['id']));
        $title = trim(strip_tags($_POST['title']));
        $description = trim(strip_tags($_POST['description']));
        $price = (int)trim(strip_tags($_POST['price']));
        print_r($_FILES['img']['name']);
        if($_FILES['img']['name']){
            function translate($input){
                $assoc = array(
                    'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'j', 'з'=>'z', 'и'=>'i', 'й'=>'i', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'y', 'ф'=>'f', 'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh', 'ы'=>'i', 'э'=>'e', 'ю'=>'u', 'я'=>'ya',
                    'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ё'=>'Yo', 'Ж'=>'J', 'З'=>'Z', 'И'=>'I', 'Й'=>'I', 'К'=>'K', 'Л'=>'L', 'М'=>'M', 'Н'=>'N', 'О'=>'O', 'П'=>'P', 'Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'Y', 'Ф'=>'F', 'Х'=>'H', 'Ц'=>'C', 'Ч'=>'Ch', 'Ш'=>'Sh', 'Щ'=>'Sh', 'Ы'=>'I', 'Э'=>'E', 'Ю'=>'U', 'Я'=>'Ya', 'ь'=>'', 'Ь'=>'', 'ъ'=>'', 'Ъ'=>'',
                );
                return $res = strtr($input, $assoc);
            }
    
            function image_resize(
                $dir,
                $dir_thumbs,
                $newwidth,
                $newheight = FALSE,
                $quality = 100 // качество для формата jpeg
            ) {
                ini_set("gd.jpeg_ignore_warning", 1); // иначе на некотоых jpeg-файлах не работает
    
                list($oldwidth, $oldheight, $type) = getimagesize($dir);
                switch ($type) {
                    case IMAGETYPE_JPEG: $typestr = 'jpeg'; break;
                    case IMAGETYPE_GIF: $typestr = 'gif' ;break;
                    case IMAGETYPE_PNG: $typestr = 'png'; break;
                }
                $function = "imagecreatefrom$typestr";
                $src_resource = $function($dir);
    
                if (!$newheight) { $newheight = round($newwidth * $oldheight/$oldwidth); }
                elseif (!$newwidth) { $newwidth = round($newheight * $oldwidth/$oldheight); }
                $destination_resource = imagecreatetruecolor($newwidth,$newheight);
    
                imagecopyresampled($destination_resource, $src_resource, 0, 0, 0, 0, $newwidth, $newheight, $oldwidth, $oldheight);
    
                if ($type = 2) { # jpeg
                    imageinterlace($destination_resource, 1); // чересстрочное формирование изображение
                    imagejpeg($destination_resource, $dir_thumbs, $quality);
                }
                else { # gif, png
                    $function = "image$typestr";
                    $function($destination_resource, $dir_thumbs);
                }
    
                imagedestroy($destination_resource);
                imagedestroy($src_resource);
            }
    
            $filePath  = $_FILES['img']['tmp_name'];
            $fileName  = translate($_FILES['img']['name']);
            $type = $_FILES['img']['type'];
            $size = $_FILES['img']['size'];
    
            if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
                if($size>0 and $size<1000000){
                    if(copy($filePath,"./img/".$fileName)){
                    image_resize("./img/".$fileName, "./img/".$fileName, 260, 280);
                        
                        if(isset($_POST['edit'])){
                            $id = (int)trim(strip_tags($_POST['edit']));
                            //editProduct($link, $id, $name, $description, DIR_BIG.$fileName, DIR_SMALL.$fileName, $price);
                            header("Location: ../admin/index.php");
                        }else{
                            $sql = "UPDATE `product` SET `price` = '$price', `title`= '$title', `description` = '$description', `img`= '$fileName' WHERE id=$idProduct;";
                            $rez = $connect->query($sql);
                        }
    
                        return "<h3>Файл успешно загружен на сервер</h3>";
                    }else{
                        return "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
                        exit;
                    }
                }else{
                return "<b>Ошибка - картинка превышает 1 Мб.</b>";
                }
            }else{
                return "<b>Картинка не подходит по типу! Картинка должна быть в формате JPEG, PNG или GIF</b>";
            }
    
        } else {
            
            $sql = "UPDATE `product` SET `price` = '$price', `title`= '$title', `description` = '$description' WHERE id=$idProduct;";
            $rez = $connect->query($sql);
            if ($rez>0){
                return "Обновления успешно внесены.";
            }
            
        }   
    }
}