<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="js/script.js"></script>
    <?php 
        include 'PHP/data_base.php'; 
        getData('admin');
        getData('user');
        include 'PHP/data.php';
    ?>
    <title>Библиотека УНПК МУК | <?php echo $lang['main']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans|Pacifico&display=swap&subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">    <title>Библиотека УНПК МУК | Главная страница</title>

</head>
<body>
    <div class="page">
        <?php include 'PHP/header.php'; ?>

        <div class="container">
        <?php include 'PHP/sidebar.php'; ?>

            <section class="content">
                <div class="users">
                    <h1 class="users__title"><?php echo $lang['title-user']; ?></h1>
                    <select id="users_fullname" class="list" disabled onchange="checkUser(id, 'users_bilet');">
                        <option value="<?php echo $lang['fullname']; ?>"><?php echo $lang['fullname']; ?></option>
                        <?php
                        for($i = 0; $i < count($GLOBALS["fullname"]); $i++ )
                        {
                            echo '<option value='.$GLOBALS["fullname"][$i].'>'.$GLOBALS["fullname"][$i].'</option>';
                        }  
                        ?>
                        
                    </select>

                    <select id="users_bilet" class="list list--margin_top_s" disabled onchange="checkUser(id, 'users_fullname');">
                        <option value="<?php echo $lang['library-card-number']; ?>"><?php echo $lang['library-card-number']; ?></option>
                        <?php
                        for($i = 0; $i < count($GLOBALS["bilet"]); $i++ )
                        {
                            echo '<option value='.$GLOBALS["bilet"][$i].'>'.$GLOBALS["bilet"][$i].'</option>';
                        }  
                        ?>
                    </select>
                </div>

                <div class="control control--margin-top_large">
                    <button disabled class="button control__button control__button--size_3" onclick="check_form_list()"><?php echo $lang['look']; ?></button>
                    <button disabled class="button control__button control__button--size_3" onclick="getPage('registration.php');"><?php echo $lang['reg']; ?></button>
                    <button disabled class="button control__button control__button--size_3" onclick="getPage('add_debt.php');"><?php echo $lang['add-debt']; ?></button>
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