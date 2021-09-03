<aside class="sidebar">
    <img src="img/<?php echo $language; ?>.png" alt="Флаг России" class="sidebar__flag" onclick="getLanguage('<?php echo $language; ?>');">
    <div class="admin">
        <div class="admin__title"><?php echo $lang['personal-area']; ?></div>
        <button class="button admin__button" id="admin__button" onclick="sign_in();"><?php echo $lang['login']; ?></button>
    </div>

    <nav class="nav nav--margin_top">
        <ul class="nav__list">
            <li class="nav__item"><a class="nav__link" onclick='validateLogin("index.php");'><?php echo $lang['main']; ?></a></li>
            <li class="nav__item"><a class="nav__link" onclick='validateLogin("registration.php");'><?php echo $lang['reg']; ?></a></li>
            <li class="nav__item"><a class="nav__link" onclick='validateLogin("add_debt.php");'><?php echo $lang['add-debt']; ?></a></li>
        </ul>
    </nav>
</aside>