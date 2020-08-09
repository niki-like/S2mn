<?php
    const HANDLER = "php/titleCode.php"; //обработчик
    require_once HANDLER; //подключение обработчика





?>
<!doctype html>
<html lang="ru">
<head>
 <meta charset="utf-8">
  <title>Админ-панель</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js" ></script>
  <script src="scripts/title.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="style/title.css">
  <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
</head>
<body>

    <header class="header">

      <div class="contain">

            <div class="box box1">
                <div class="title">Заголовок</div>
                <div class="comment">Комментарий</div>
            </div>

            <div class="box box2">
                <div class="title">Заголовок</div>
                <div class="comment">Комментарий</div>
            </div>

            <div class="box box3">
                <div class="title">Заголовок</div>
                <div class="comment">Комментарий</div>
            </div>

        </div>


    </header>
    <nav>
      <form class="menu" action="" method="post">
        <select class="downArea" name="">
          <option value="" selected>Выберите категорию</option>
        </select>
        <div class="containMenu">
          <input type="text" name="" value="" class="menuInput" placeholder="Поиск по названию">
          <input type="text" name="" value="" class="menuInput" placeholder="Поиск по автору">
        </div>
      </form>
    </nav>

    <main>
      <div class="articles">
sdf
      </div>
    </main>



<?php //info($user,$subscribes); ?>
</body>
</html>
