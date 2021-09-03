<?php
    echo '<script>
    var logins_admin ='.$GLOBALS["json_login"].';
    var passwords_admin ='.$GLOBALS["json_password"].';
    </script>';

    echo '<script>
        var ID_user = '.$GLOBALS["ID"].';
        </script>';
?>

<script>
    var global_user_id = '<?php echo $GLOBALS["ID"][0]; ?>';
    var global_login_user = '<?php echo $GLOBALS["login"][0]; ?>';
    var global_login_password = '<?php echo $GLOBALS["password"][0]; ?>';
</script>

<?php
    $language = $_COOKIE['language'];
    if($language != '')
    {
        if($language == 'kg_KG')
        {
            $language = 'kg_KG';
        }
        else if($language == 'ru_RU')
        {
            $language = 'ru_RU';
        }
    }
    else
    {
        $language = 'ru_RU';
    }
   
    switch($language)
    {
        case 'ru_RU':
           include './language/ru_RU.php';
        break;
        case 'kg_KG':
           include './language/kg_KG.php';
        break;
    }  
    
    $json_lang = json_encode($lang);

    echo 
    '<script>
    var lang = '.$json_lang.';
    </script>';
?>
