<?php
require_once "settings.php";// подключение настроек

if(count($_COOKIE['login']) == 0 && count($_COOKIE['password']) == 0){//если нет кук то возвращаем назад
    echo"кук нету ";
    echo("<script>location.href='http://s2mn/index.php'</script>");
    exit();
}else{
//куки есть
    $id = $_COOKIE['id'];
    $login = $_COOKIE['login'];
    $password = $_COOKIE['password'];

    $user = R::findOne('users', 'id = ? and login = ? and password = ?', [$id, $login, $password]);//поиск user(а)
    $subscribes = R::find('subscribe','iduser = ?',[$user['id']]);//поиск подписок МАССИВ










        // echo"<Пользователь: >";
        // print_r($user);
        // echo"<br>";
        // echo"<br> Подписки: ";
        // print_r ($subscribes);
        // echo"<br>";
        // echo"<br> Пример массива подписок: ";
        // echo $subscribes[1];
        // echo"<br>";
        // print_r($subscribes);
        //  echo"<br>";
        // echo"<br> Кол-во подписок: ";
        // echo count($subscribes);



////////////////////////////////////////////////
//    echo "<br>user: ".$user;
//     $subscribe = R::findAll('subscribe','WHERE `iduser` = ?',[$_COOKIE['id']]);
//    echo"<br><br>";
//    print_r($subscribe);
   // echo"<br>". gettype($user);
////////////////////////////////////////////////
//поиск всех подписок пользователя по id из куки
//
//    $subscribesUser = R::find('subscribe','iduser = ?', [$id]);//подписки пользователя В ВИДЕ МАССИВА
//    $subscribesAll = R::exec('SELECT * FROM  `hobbie`');
//    echo "<br><br>";
//    echo $subscribesAll;

//    function search_settings(){//настройки поиска
//        echo"<div class=\"searchSettings\">
//            <form class=\"sS\" method=\"POST\">
//
//               <select required class=\"category\" name=\"category\">
//                <option >Выберите категорию</option>";
//            for($i=1; $i <= R::exec('SELECT * FROM  `hobbie`'); $i++){
//                $name = R::findOne('hobbie','id = ?',[$i]);
//                echo "<option>".$name['name']."</option>";
//
//            }
//
//        echo"  </select>
//
//               <input type=\"text\" class=\"articleID\" name=\"articleID\" placeholder=\"Точный ID статьи\">
//               <div class=\"popular\">
//               <input type=\"range\" class=\"range\" name=\"range\" min=\"0\" max=\"1000\" value=\"0\">
//                  <div class=\"valuePopulars\">популярность</div>
//               </div>
//
//          </form>
//        </div>";
//    }


}
?>
