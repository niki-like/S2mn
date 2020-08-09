<?php
require_once "settings.php";

$id = $_COOKIE['id'];
$login = $_COOKIE['login'];
$password = $_COOKIE['password'];

$user = R::findOne('users', 'id = ? and login = ? and password = ?', [$id, $login, $password]);//поиск user(а)
$subscribes = R::find('subscribe','iduser = ?',[$user['id']]);//поиск подписок МАССИВ





/////////////////////////////////////////////////////////////////////////////////
if(empty($_POST['subscribe'])){

  foreach ($subscribes as $key => $value) {
    $subscribesIDHOBBIE[] = $value["idhobbie"];
  }
  foreach ($subscribesIDHOBBIE as $key => $value) {
    $subscribesNAME[] = R::findOne('hobbie','id = ?',[$value])["name"];
  }


  echo json_encode($subscribesNAME);

}































?>
