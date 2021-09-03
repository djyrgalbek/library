<?php
function getData($name)
{
        $db = mysql_connect("localhost","cx98606_library","library","cx98606_library");
        mysql_set_charset("utf-8", $db);
        mysql_select_db("cx98606_library", $db) or die("Нет соединения с БД! ".mysql_error());

    if($name == 'admin')
    {
               
        $id = Array();
        $login = Array();
        $password = Array();
        $i = 0;
    
        $read_table_admin = mysql_query("SELECT * FROM `admin` WHERE 1");
        while($admin = mysql_fetch_array($read_table_admin))
        {
            $id[$i] = $admin['id'];
            $login[$i] = $admin['login'];
            $password[$i] = $admin['password'];
            $i++;
        }
        /* echo $login[0];
        echo $password[0]; */
        $GLOBALS["json_login"] = json_encode($login);
        $GLOBALS["json_password"] = json_encode($password);
    }
    else if($name == 'user')
    {
               
        $ID = Array();
        $GLOBALS["fullname"][] = Array();
        $GLOBALS["bilet"][] = Array();
        $i = 0;
    
        $read_table_users = mysql_query("SELECT * FROM `users` WHERE 1");
        while($users = mysql_fetch_array($read_table_users))
        {
            $ID[$i] = $users['ID'];
            $GLOBALS["fullname"][$i] = $users['fullname'];
            $GLOBALS["bilet"][$i] = $users['bilet'];
            $i++;
        }
        $GLOBALS["ID"] = json_encode($ID);
    }
    else if('books')
    {
              
        $id_GET = $_GET['id_GET'];
        $GLOBALS["ID"][] = Array();
        $GLOBALS["fullname"][] = Array();
        $GLOBALS["bilet"][] = Array();
        $GLOBALS["login"][] = Array();
        $GLOBALS["password"][] = Array();
        $GLOBALS["name_book"][] = Array();
        $GLOBALS["author"][] = Array();
        $GLOBALS["year"][] = Array();
        $GLOBALS["date_of_receiving"][] = Array();
        $GLOBALS["return_date"][] = Array();
        $i = 0;
        $k = 0;
    
        $read_table_users = mysql_query("SELECT * FROM `users` WHERE `ID`='$id_GET'", $db);
        while($users = mysql_fetch_array($read_table_users))
        {
            $GLOBALS["fullname"][$i] = $users['fullname'];
            $GLOBALS["bilet"][$i] = $users['bilet'];
            $GLOBALS["login"][$i] = $users['login'];
            $GLOBALS["password"][$i] = $users['password'];
            $i++;
        }

        $read_table_books = mysql_query("SELECT * FROM `books` WHERE `id_user`='$id_GET'", $db);
        while($books = mysql_fetch_array($read_table_books))
        {
            $GLOBALS["name_book"][$k] = $books['name_book'];
            $GLOBALS["return_date"][$k] = $books['return_date'];
            $GLOBALS["author"][$k] = $books['author'];
            $k++;
        }

        //echo count($GLOBALS["name_book"]);
        //echo $GLOBALS["author"];
    }
   
}
?>