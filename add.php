<?php
session_start();

if (!isset($_POST['name']) || !isset($_POST['tel'])){
    $_SESSION['message'] = "Данные не переданы";
    header("Location: /project");
    die();
}

if(mb_strlen($_POST['name'], 'utf-8') < 2 ||
   mb_strlen($_POST['name'], 'utf-8') > 29 ){
    $_SESSION['message'] = "Длина имени от 2 до 29 символов";
    header("Location: /project");
    die();
}

if(mb_strlen($_POST['tel'], 'utf-8') != 11 &&
   mb_strlen($_POST['tel'], 'utf-8') != 12 ){
    $_SESSION['message'] = "Длина телефона 11 или 12 символов";
    header("Location: /project");
    die();
}

require_once "User.php";

$is_add = User::add([
    "name" => $_POST['name'],
    "tel" => $_POST['tel']
]);
if($is_add > 0){
    $_SESSION['message'] = "Пользватель " . $_POST['name'] . " успешно добавлен";
}else{
    $_SESSION['message'] = "Не получилось добавить пользвателя";
}
header("Location: /project");