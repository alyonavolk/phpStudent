<?php 
header("Content-Type:text/html; charset=UTF-8;");

require_once("api/config.php");
require_once("api/core.php");

if (isset($_GET['option'])) { //проверяет пришел ли get параметр
    $class = trim(stripslashes(htmlspecialchars($_GET['option'])));
}
elseif (isset($_POST['option'])) {
    $class = trim(stripslashes(htmlspecialchars($_POST['option'])));
}
else {
    $class = 'main';
}

if (file_exists("api/".$class.".php")) {
    include("api/".$class.".php");
    if(class_exists($class)) {
        $obj = new $class;
        $obj -> get_body();
    } else {
        exit("<p>Не верные данные входа</p>");
    } 
} else {
    exit("<p>Не правильный адрес</p>");
}
