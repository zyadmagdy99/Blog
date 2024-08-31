<?php

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if($lang == "ar"){
    $langauage = parse_ini_file("BLOG/langauge/ar.ini");

}else{
    $langauage = parse_ini_file("../langauge/en.ini");

}

// header("location:../index.php");

echo $langauage['blog'];