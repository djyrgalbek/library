<?php
        $db = mysql_connect("localhost","cx98606_library","library","cx98606_library");
        mysql_set_charset("utf-8", $db);
        mysql_select_db("cx98606_library", $db) or die("Нет соединения с БД! ".mysql_error());

    $ID = $_POST['ID'];
    $name_book = $_POST['name_book'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $date_of_receiving = $_POST['date_of_receiving'];
    $return_date = $_POST['return_date'];

    $write = mysql_query("INSERT INTO `books`(`ID`, `id_user`, `name_book`, `author`, `year`, `date_of_receiving`, `return_date`) VALUES (NULL, '$ID', '$name_book', '$author', '$year', '$date_of_receiving', '$return_date')", $db);
    
    echo true;
?>