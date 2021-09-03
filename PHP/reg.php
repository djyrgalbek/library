<?php
        $db = mysql_connect("localhost","cx98606_library","library","cx98606_library");
        mysql_set_charset("utf-8", $db);
        mysql_select_db("cx98606_library", $db) or die("Нет соединения с БД! ".mysql_error());

    $fullname = $_POST['fullname'];
    $bilet = $_POST['bilet'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $read = mysql_query("SELECT `login` FROM `users` WHERE `login`='$login'", $db);
    $num = mysql_num_rows($read);

    if($num == 0)
    {
        $write = mysql_query("INSERT INTO `users`(`ID`, `fullname`, `bilet`, `login`, `password`, `data`) VALUES (NULL,'$fullname','$bilet','$login', '$password', NOW())", $db);
        echo 'true';
    }
    else
    {
        echo 'false';
    }
?>