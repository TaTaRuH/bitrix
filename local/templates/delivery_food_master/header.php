<?php
use Bitrix\Main\Page\Asset;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <?php $APPLICATION->Showhead();
    Asset::getinstance()->addCss(SITE_TEMPLATE_PATH . "/css/normalize.css");
    Asset::getinstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");
    Asset::getinstance()->addCss(SITE_TEMPLATE_PATH . "/css/swiper-bundle.min.css");
    ?>
</head>
<body>
<?= $APPLICATION->ShowPanel();?>
<header class="header container">
    <a href="/" class="logo">
        <img src="<?= SITE_TEMPLATE_PATH?>/img/logo.png" alt="Лого: Индекс Еда" class="logo-image">
    </a>
    <form action="#" class="search-form">
        <input type="search" placeholder="Блюдa" class="search-input">
        <button class="search-button">
            <img src="<?= SITE_TEMPLATE_PATH?>/img/search-icon.svg" alt="search-icon" class="search-icon">
        </button>
    </form>
    <div class="auth">
        <a href="#" class="login">Войти</a>
    </div>
    <!-- /.auth -->
    <a href="" class="shoping-cart">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_5:2)">
                <path d="M22.713 4.077C22.4317 3.73944 22.0796 3.46795 21.6815 3.28182C21.2835 3.09568 20.8494 2.99946 20.41 3H4.242L4.2 2.649C4.11405 1.91942 3.76338 1.24673 3.21449 0.758478C2.6656 0.270223 1.95663 0.000341793 1.222 0L1 0C0.734784 0 0.48043 0.105357 0.292893 0.292893C0.105357 0.48043 0 0.734784 0 1C0 1.26522 0.105357 1.51957 0.292893 1.70711C0.48043 1.89464 0.734784 2 1 2H1.222C1.46693 2.00003 1.70334 2.08996 1.88637 2.25272C2.06941 2.41547 2.18634 2.63975 2.215 2.883L3.591 14.583C3.73385 15.7998 4.31848 16.9218 5.23391 17.736C6.14934 18.5502 7.33185 19 8.557 19H19C19.2652 19 19.5196 18.8946 19.7071 18.7071C19.8946 18.5196 20 18.2652 20 18C20 17.7348 19.8946 17.4804 19.7071 17.2929C19.5196 17.1054 19.2652 17 19 17H8.557C7.93806 16.9983 7.3348 16.8051 6.82994 16.4471C6.32507 16.089 5.94331 15.5835 5.737 15H17.657C18.8293 15.0001 19.9643 14.5882 20.8638 13.8364C21.7633 13.0846 22.37 12.0407 22.578 10.887L23.363 6.533C23.4414 6.10101 23.4237 5.65707 23.3114 5.23264C23.1991 4.80821 22.9948 4.41368 22.713 4.077ZM21.4 6.178L20.614 10.532C20.4891 11.225 20.1245 11.852 19.5839 12.3032C19.0433 12.7544 18.3612 13.0011 17.657 13H5.419L4.478 5H20.41C20.5569 4.99912 20.7022 5.03062 20.8355 5.09226C20.9689 5.15389 21.087 5.24415 21.1815 5.35661C21.276 5.46907 21.3446 5.60097 21.3824 5.74294C21.4201 5.8849 21.4262 6.03344 21.4 6.178Z" fill="white"/>
                <path d="M7.00012 24.0006C8.10469 24.0006 9.00011 23.1052 9.00011 22.0006C9.00011 20.8961 8.10469 20.0006 7.00012 20.0006C5.89555 20.0006 5.00012 20.8961 5.00012 22.0006C5.00012 23.1052 5.89555 24.0006 7.00012 24.0006Z" fill="white"/>
                <path d="M17 24.0006C18.1046 24.0006 19 23.1052 19 22.0006C19 20.8961 18.1046 20.0006 17 20.0006C15.8954 20.0006 15 20.8961 15 22.0006C15 23.1052 15.8954 24.0006 17 24.0006Z" fill="white"/>
            </g>
            <defs>
                <clipPath id="clip0_5:2">
                    <rect width="24" height="24" fill="white"/>
                </clipPath>
            </defs>
        </svg>
        <span class="shoping-counter">12</span>
    </a>
    <!-- /.shoping-cart -->
</header>

