<?php
const NEXT_PAGE = "title.php";//адрес следущей страницы
///*********************************************ИДЕИ ЧТО ИЗМЕНИТЬ*****************************************
//СОЗДАТЬ МАССИВ С ОШИБКАМИ И В КОНЦЕ СТРАНИЦЫ ВЫВЕСТИ ЕГО КАК ALERT ЧЕРЕЗ JS И ТОГДА НЕ БУДЕТ БАГА С 
//ПОЯВЛЕНИЕМ ВСПЛЫВАЮЩЕГО ОКНА ВО ВРЕМЯ ПЕРЕХОДА НА INDEX.PHP ЭТО ПРОИСХОДИТ ИЗ-ЗА ПРОГРУЗКИ ВСЕЙ СТРАНИЦЫ
//-> EXIT() РЕШАЕТ ПРОБЛЕМУ ПУТЕМ ОСТАНОВКИ ПРОГРУЗКИ СТРАНИЦЫ И ПЕРЕХОДА СРАЗУ НА СЛЕДУЮЩУЮ
//*******************************************************************************************************/

require_once "php\settings.php";// подключение настроек


if($_COOKIE['login'] && $_COOKIE['password'] != ""){//если куки найдены то выполняется код при нажатии авторизоваться или зарегестрироваться, страница обновляется и уже существуют куки
    echo("<script>location.href='http://s2mn/".NEXT_PAGE."'</script>");
    exit();
}



$errors=[];
if($_COOKIE['login'] && $_COOKIE['password'] != ""){//если куки найдены то выполняется код при нажатии авторизоваться или зарегестрироваться, страница обновляется и уже существуют куки
    echo("<script>location.href='http://s2mn/".NEXT_PAGE."'</script>");
    exit();
}else{   
if(isset($_POST['Enter'])){
    $login = $_POST['ALogin'];
    $password = $_POST['APassword'];
    if($login != "" && $password != ""){    
        //поиск пользователя в таблице
        $user = R::findOne('users', 'login = ? and password = ?', [$login, $password]);
        //создание кук по найденой записи
        SetCookie("id",$user["id"],time()+3600);  
        SetCookie("login","$login",time()+3600);  
        SetCookie("password","$password",time()+3600);  
        echo("<script>location.href='http://s2mn/".NEXT_PAGE."'</script>");//переходим на другую страницу
    }else{
        array_push($errors, "Не все поля заполнены при авторизации.");
    }
}

if(isset($_POST['Register'])){
    $nickname = $_POST['Nickname'];//ник регистрации
    $login = $_POST['RLogin'];//логин регистрации
    $password = $_POST['RPassword'];//пароль регистрации
    $passwordSecond = $_POST['RPasswordSecond'];//проверка повторного пароля
    if($nickname != "" && $login != "" && $password != "" && $passwordSecond != ""){//проверка пустых полей
        if($password == $passwordSecond){//совпадают ли пароли
            $foundUser = R::findOne('users', ' nickname = ? or login = ?', [$nickname, $login]);//поиск пользователя
            if($foundUser == NULL){//создание пользователя
                $user = R::dispense('users');//подключение к таблице
                $user -> nickname = $nickname;   //
                $user -> login = $login;         // 3 поля - занесение даные в поля
                $user -> password = $password;   //
                R::store($user); //сохранение
                R::close(); //закрытие
                //*******************************************************************//
                $foundUser = R::findOne('users', ' nickname = ? or login = ?', [$nickname, $login]);//поиск существующего пользователя
                //создание кук пользователя
                SetCookie("id",$foundUser["id"],time()+3600); 
                SetCookie("login","$login",time()+3600); 
                SetCookie("password","$password",time()+3600);
                echo("<script>location.href='http://s2mn/".NEXT_PAGE."'</script>");
            }else{
                echo"
                    <script>
                        alert(\"Логин или псевдоним уже заняты\");
                    </script>
                ";
            }
                
     
            


        }else{
            echo"
            <script>
                 alert(\"Пароли не совпадают\");
            </script>
            ";
        }             
    }else{
        echo"
            <script>
                 alert(\"Не все поля заполнены\");
            </script>
            ";
    }
}

}


?>



<!doctype html>
<html lang="ru">
<head>
 <meta charset="utf-8">
  <title>Админ-панель</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js" ></script>
  <script src="scripts/script.js"></script> 
  <link rel="stylesheet" href="style/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
</head>
<body>


<div class="all">
    <div class="context">
        <div class="authorization forms">
            <form action="" method="post" id="autorization">
                <h2>Авторизация</h2>
                <p>Логин:<br><input type="text" name="ALogin" maxlength="40"></p>
                <p>Пароль:<br><input type="password" name="APassword" maxlength="40"></p>
                <input type="submit" value="Войти" name="Enter">
                <?php// echo"<br>"; var_dump($errors); ?>
                <div class="test"></div>
            </form>
        </div>
        <div class="neutral">
            <p class="titleInformation">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit at veritatis cumque molestiae maiores neque odit tenetur facilis ipsa itaque eius dicta, unde nostrum sint, officiis, cum facere dolore. Temporibus.
            </p>
            
            <p class="switch">
                <span class="switchR">Регистрация</span>/<span class="switchA">Авторизация</span>
            </p>
        </div>
        <div class="registration forms">
            <form action="" method="post">
                <h2>Регистрация</h2>
                <p>Псевдоним:<br><input value="<?php echo $_POST["Nickname"]?>" type="text" name="Nickname" maxlength="20"></p>
                <p>Логин:<br><input value="<?php echo $_POST["RLogin"]?>" type="text" name="RLogin" maxlength="40"></p>
                <p>Пароль:<br><input value="<?php echo $_POST["RPassword"]?>" type="password" name="RPassword" maxlength="40"></p>
                <p>Пароль:<br><input type="password" name="RPasswordSecond" maxlength="40"></p>
                <input type="submit" value="Зарегестрироваться" name="Register">
                <?php// echo"<br>"; var_dump($foundUser); ?>
            </form>
        </div>
    </div>
</div>


 
 
 
 


<script>

</script>
</body>
</html>   
































































