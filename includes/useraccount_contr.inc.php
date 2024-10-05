<?php
declare(strict_types=1); // helps at avoiding bugs force ints to need int string to need string etc... and not be the kind of diy all data types mode


function get_imagepath(){
    $basedir="images/";
    if (isset($_SESSION["UserName"])){
        $extensions = ['jpg', 'jpeg', 'png'];
        foreach ($extensions as $extension){
            $filepath=$basedir. $_SESSION["UserName"] .".".$extension;
            if(file_exists($filepath)){
                $imagepath=$filepath;
                return $imagepath;
            }
        }

    }
 return 'images/default.jpg';
}