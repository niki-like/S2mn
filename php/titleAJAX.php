<?php
require_once "settings.php";

$id = $_COOKIE['id'];
$login = $_COOKIE['login'];
$password = $_COOKIE['password'];

$user = R::findOne('users', 'id = ? and login = ? and password = ?', [$id, $login, $password]);//поиск user(а)
$subscribes = R::find('subscribe','iduser = ?',[$user['id']]);//поиск подписок МАССИВ






if(empty($_POST['subscribe'])){

  foreach ($subscribes as $key => $value) {//перебор подписок
    $subscribesIDHOBBIE[] = $value["idhobbie"];//id hobbie
  }
  foreach ($subscribesIDHOBBIE as $key => $value) {
    $subscribesNAME[] = R::findOne('hobbie','id = ?',[$value])["name"];//имена хоби в массив <--
    $subscribesID[] = R::findOne('hobbie','id = ?',[$value])["id"];//id хоби в массив <--
  }
  foreach ($subscribesID as $value) {
      $findArticles[] = R::find('article','idhobbies = ?',[$value]);
  }
  $jsonReturn["subscribesNAME"] = $subscribesNAME;
  $jsonReturn["findArticles"] = $findArticles; //$findArticles;
  echo json_encode($jsonReturn);
}
































?>
