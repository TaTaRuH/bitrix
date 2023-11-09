<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="slider container">
</div>
<!-- /slider -->
<!-- Slider main container -->
<div class="swiper container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <?php foreach($arResult["ITEMS"] as $arItem):?>
            <div class="swiper-slide">
                <div class="slide slide-text-light slide-summer" style ="background-image: url('<?= $arItem['PREVIEW_PICTURE']['SRC']?>') ">
                    <div class="slide-content">
                        <h2 class="slide-title"><?php echo $arItem["NAME"] ?></h2>
                        <p class="slide-text"><?php echo $arItem["PREVIEW_TEXT"]?></p>
                        <a href="#" class="button button-primary">Заказать со скидкой</a>
                    </div>
                </div>
                <!-- /slide -->
            </div>
        <?php endforeach;?>
    </div>
<!-- If we need navigation buttons -->
    <div class="slider-buttons">
        <div class="slider-button slider-button-prev">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="20" fill="#EBEBEB" fill-opacity="0.7"/>
                <path d="M24.752 31.994L14.879 22.121C14.3166 21.5584 14.0006 20.7955 14.0006 20C14.0006 19.2045 14.3166 18.4416 14.879 17.879L24.746 8.01201L26.16 9.42601L16.293 19.293C16.1055 19.4805 16.0002 19.7348 16.0002 20C16.0002 20.2652 16.1055 20.5195 16.293 20.707L26.166 30.58L24.752 31.994Z" fill="#F66A15"/>
            </svg>
        </div>
        <div class="slider-button slider-button-next">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="20" transform="rotate(-180 20 20)" fill="#EBEBEB" fill-opacity="0.7"/>
                <path d="M15.248 8.00599L25.121 17.879C25.6834 18.4416 25.9994 19.2045 25.9994 20C25.9994 20.7955 25.6834 21.5584 25.121 22.121L15.254 31.988L13.84 30.574L23.707 20.707C23.8945 20.5195 23.9998 20.2652 23.9998 20C23.9998 19.7348 23.8945 19.4805 23.707 19.293L13.834 9.41999L15.248 8.00599Z" fill="#F66A15"/>
            </svg>

        </div>
    </div>
</div>
