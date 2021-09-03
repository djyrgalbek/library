<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery-321js-1.js"></script>
    <?php 
        include 'PHP/data_base.php'; 
        getData('books');
        include 'PHP/data.php';
    ?>
    <title>Библиотека УНПК МУК | <?php echo $lang['user']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans|Pacifico&display=swap&subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">

</head>
<body>
    <div class="page">
        <?php include 'PHP/header.php'; ?>

        <div class="container">
        <?php include 'PHP/sidebar.php'; ?>

            <section class="content">
                <div class="info">
                    <h1 class="info__title"><?php echo $lang['u_title-user']; ?></h1>
                    <p class="info__name"><?php echo $lang['fullname']; ?>: <?php echo  $GLOBALS["fullname"][0]; ?></p>
                    <p class="info__name info__name--margin_top"><?php echo $lang['library-card-number']; ?>: <?php echo  $GLOBALS["bilet"][0]; ?></p>
                    <table class="info__table">
                        <tr>
                            <th><?php echo $lang['book']; ?></th>
                            <th><?php echo $lang['author']; ?></th>
                            <th><?php echo $lang['return_date']; ?></th>
                        </tr>

                        <?php
                        if(count($GLOBALS["name_book"]) > 0)
                        {
                            for($k = 0; $k < count($GLOBALS["name_book"]); $k++)
                            {
                                echo '<tr>
                                <td>'.$GLOBALS["name_book"][$k].'</td>
                                <td>'.$GLOBALS["author"][$k].'</td>
                                <td>'.$GLOBALS["return_date"][$k].'</td>
                                </tr>';
                            }
                        }
                            
                           
                        ?>
                    </table>
                
                    <button id="loginInfo" class="button control__button control__button--size_1 info__button" onclick="showLogin();"><?php echo $lang['look_login_pass']; ?></button>
                </div>

            </section>
        </div>

        <?php
            include 'PHP/footer.php';
       ?>
    </div>
    <script>
        redirect();
    </script>
</body>
</html>