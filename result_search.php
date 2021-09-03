<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php 
        include 'PHP/data.php';
    ?>
    <title>Библиотека УНПК МУК | <?php echo $lang['result_search']; ?></title>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="js/script.js"></script>
    <?php
        $db = mysql_connect("localhost","cx98606_library","library","cx98606_library");
        mysql_set_charset("utf-8", $db);
        mysql_select_db("cx98606_library", $db) or die("Нет соединения с БД! ".mysql_error());
             
        if(isset($_GET['search_word']))
        {
            $search_word = $_GET['search_word'];
        }
    
        if($search_word!="")
        {
            $search_word_filtr = preg_replace('/[^a-zA-Zа-яА-Я0-9\s]/ui', '', $search_word);
            $word = explode(" ", $search_word_filtr);
           
            $id_user = Array();
            $fullname = Array();
            $bilet = Array();
    
            $id_book = Array();
            $id_user_book = Array();
            $name_book = Array();
            $author = Array();

            $i = 0;
            $m = 0;
    
            $user = Array();
            $book = Array();
    
            for($k = count($word) - 1; $k >= 0 ; $k--)
            {
                $read_table_user = mysql_query("(SELECT * FROM users WHERE fullname LIKE '%$word[$k]%')", $db);
    
                while($arr_user = mysql_fetch_array($read_table_user))
                {
                    $id_user[$i] = $arr_user['ID'];
                    $fullname[$i] = $arr_user['fullname'];
                    $bilet[$i] = $arr_user['bilet'];
                    $i++;
                }
    
                $read_table_books = mysql_query("(SELECT * FROM books WHERE name_book LIKE '%$word[$k]%')", $db);
    
                while($arr_books = mysql_fetch_array($read_table_books))
                {
                    $id_book[$m] = $arr_books['ID'];
                    $id_user_book[$m] = $arr_books['id_user'];
                    $name_book[$m] = $arr_books['name_book'];
                    $author[$m] = $arr_books['author'];
                    $m++;
                }
            }
    
           $flag = false;
            for ($n = 0; $n < count($fullname); $n++)
            {
                for($m = $n + 1; $m <= count($fullname); $m++)
                {
                    if($id_user[$n] != $id_user[$m])
                    {
                        $flag = true;
                    }
                    else
                    {
                        $flag = false;
                        break;
                    }
                }
                if($flag == true)
                {
                    array_push($user, $n);
                    //echo $fullname[$n];
                }
            }

            $flag_book = false;
            for ($n = 0; $n < count($name_book); $n++)
            {
                for($m = $n + 1; $m <= count($name_book); $m++)
                {
                    if($id_book[$n] != $id_book[$m])
                    {
                        $flag_book = true;
                    }
                    else
                    {
                        $flag_book = false;
                        break;
                    }
                }
                if($flag_book == true)
                {
                    array_push($book, $n);
                    //echo $fullname[$n];
                }
            }
            
        }
        else
        {
            $empty = true;
        }
        //print_r($name_book);
        //print_r( $book);
    ?>
    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans|Pacifico&display=swap&subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">    <title>Библиотека УНПК МУК | Главная страница</title>

</head>
<body>
    <div class="page">
        <?php include 'PHP/header.php'; ?>

        <div class="container">
        <?php include 'PHP/sidebar.php'; ?>

            <section class="content">
                <div class="result-search">
                    <h3 class="result-search__title"><?php echo $lang['result_search']; ?></h3>
                    <?php
                    if($empty || count($user) == 0 && count($book) == 0)
                    {
                        echo '<p class="result-search__empty">'.$lang['no_found'].'</p>';
                    }
                    else
                    {
                        for($s = 0; $s < count($user); $s++)
                        {
                            $index_user = $user[$s];
                            echo '<a href="user.php?id_GET='.$id_user[$index_user].'" class="result-search__link">'.$fullname[$index_user].'. '.$lang['library-card-number'].': '.$bilet[$index_user].'</a><br>';
                        }
                        
                        for($d = 0; $d < count($book); $d++)
                        {
                            $index_book = $book[$d];
                            echo '<a href="user.php?id_GET='.$id_user_book[$index_book].'" class="result-search__link">'.$name_book[$index_book].'. '.$lang['author'].': '.$author[$index_book].'</a><br>';
                        }
                    }
                    ?>
                </div>
            </section>
        </div>

        <?php
            include 'PHP/footer.php';
       ?>
    </div>
    <form name="form_id" method="GET" action="user.php">
        <input type="hidden" id="id_GET" name="id_GET">
    </form>
    <script>
        getDataAdmin();
    </script>
</body>
</html>