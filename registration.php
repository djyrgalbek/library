<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery-321js-1.js"></script>
    <?php 
        include 'PHP/data.php';
    ?>
    <title>Библиотека УНПК МУК | <?php echo $lang['reg']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans|Pacifico&display=swap&subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
</head>
<body>
    <div class="page">
        <?php include 'PHP/header.php'; ?>

        <div class="container">
        <?php include 'PHP/sidebar.php'; ?>

            <section class="content">
                <div class="users">
                    <h1 class="users__title"><?php echo $lang['reg']; ?></h1>
                    <form name="reg" class="form">
                        <h6 class="form__title"><?php echo $lang['fullname']; ?>:</h6>
                        <input type="text" name="fullname" class="form__input">

                        <h6 class="form__title"><?php echo $lang['library-card-number']; ?>:</h6>
                        <input type="number" name="bilet" class="form__input">

                        <h6 class="form__title"><?php echo $lang['log']; ?>:</h6>
                        <input type="login" name="login" class="form__input">

                        <h6 class="form__title"><?php echo $lang['pass']; ?>:</h6>
                        <input type="password" name="password" class="form__input">
                    </form>
                </div>

                <div class="control control--margin-top_medium">
                    <button disabled class="button control__button control__button--size_2" onclick="validate();"><?php echo $lang['add']; ?></button>
                    <button disabled class="button control__button control__button--size_2" onclick="clearForm('form__input');"><?php echo $lang['reset']; ?></button>
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