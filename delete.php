<?php
session_start();
if(!isset($_GET['id'])){
    $_SESSION['message'] = " ID не найден";
    header("Location: /project");
    die();
}
require_once "User.php";

$is_delete = User::delete((int) $_GET['id']);
if($is_delete > 0){
    $_SESSION['message'] = "Пользватель успешно удален";

}else {
    $_SESSION['message'] = "При удалении произошла ошибка";
}
header("Location: /project");