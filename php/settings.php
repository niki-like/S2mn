<?php

 require_once 'rb.php';    


    $host = '127.0.0.1';
    $user = 'root';
    $pass = '';
    $bd = 'site';
    $table = 'users';
    R::setup( 'mysql:host='.$host.';dbname='.$bd,$user, $pass);

    $elements = R::count($table); //колличество элементов в таблице
    $maxID = R::findLast($table); //последний элемент в таблице arrey

function maxID($table, $tableElement){//возвращает последний элемент через функцию
    $maxID = R::findLast($table);
    return $maxID[$tableElement];
};



















































?>