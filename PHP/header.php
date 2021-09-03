<header class="head">
    <div class="logo">
        <img src="img/logo.png" alt="Логотип библиотеки УНПК МУК" class="logo__img logo__img--size_l">
        <h1 class="logo__title logo__title--size_l">БиблиоМУК</h1>
    </div>
    <form name="search-form" mehthod="GET" action="result_search.php" class="search-form">
        <input type="search" name="search_word" id="search-form__input" class="search-form__input" placeholder="<?php echo $lang['search-form']; ?>">
        <img src="img/search-button.png" alt="Кнопка поиска" class="search__button" onclick="validateLogin('result_search.php');">
    </form>
    
</header>