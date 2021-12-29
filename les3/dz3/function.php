<?php

function smallImgLoad($img) {
    $files = scandir($img);
        //print_r($files);
        $blok='';
        for($i=2;$i < count($files);$i++){
            $blok .=  "<div class='container-blok'>
                <a href='fullImage.php?img=$files[$i]'><img width='150' src='small/$files[$i]' alt=''></a>
            </div>";
        
        };

    return $blok;
       
};
       
