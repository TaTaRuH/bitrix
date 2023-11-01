<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<section>
    <div class="container product_slider">
        <div class="swiper mySwiper4">
            <div class="swiper-wrapper">
                <? foreach ($arResult as $arElement) : ?>
                    <?
                    // ссылки для экшенов и название кнопки
                    $arButtons = CIBlock::GetPanelButtons(
                    // идентификатор инфоблока, которому принадлежит элемент
                        $arElement["IBLOCK_ID"],
                        // идентификатор текущего элемента информационного блока
                        $arElement["ID"],
                        // идентификатор раздела инфоблока (при наличии)
                        0,
                        // массив, содержащий локализацию названий
                        array("SECTION_BUTTONS" => false, "SESSID" => false)
                    );
                    // экшен изменения элемента
                    $this->AddEditAction(
                    // идентификатор текущего элемента информационного блока
                        $arElement["ID"],
                        // ссылка из $arButtons на изменение эллемента
                        $arButtons["edit"]["edit_element"]["ACTION_URL"],
                        // название кнопки
                        $arButtons["edit"]["edit_element"]["TEXT"]
                    );
                    // экшен добавления элемента
                    $this->AddEditAction(
                    // идентификатор текущего элемента информационного блока
                        $arElement["ID"],
                        // ссылка из $arButtons на изменение эллемента
                        $arButtons["edit"]["add_element"]["ACTION_URL"],
                        // название кнопки
                        $arButtons["edit"]["add_element"]["TEXT"]
                    );
                    // экшен удаления элемента
                    $this->AddDeleteAction(
                    // идентификатор текущего элемента информационного блока
                        $arElement["ID"],
                        // ссылка из $arButtons на изменение эллемента
                        $arButtons["edit"]["delete_element"]["ACTION_URL"],
                        // название кнопки
                        $arButtons["edit"]["delete_element"]["TEXT"],
                        array("CONFIRM" => "Удалить?")
                    ); ?>
                    <?
                    // проверка на администратора для вывода экшенов
                    if ($USER->IsAdmin() && $APPLICATION->GetShowIncludeAreas()) {
                        echo '<div class="swiper-slide" id="' . $this->GetEditAreaId($arElement["ID"]) . '">';
                    } else {
                        echo '<div class="swiper-slide">';
                    } ?>
                    <div class="product">
                        <div class="item">
                            <div class="col-1 title"><?= $arElement["IBLOCK_ELEMENTS_ELEMENT_CATALOG_network_COLOR"] ?></div>
                            <div class="col-4 image"><img src="<?= $arElement["KARTINKA_VALUE"]["SRC"] ?>" alt="<?= $arElement["KARTINKA_VALUE"]["DESCRIPTION"] ?>" width="40" height="40"></div>
                            <div class="col-12 button"><a href="<?= $arElement["IBLOCK_ELEMENTS_ELEMENT_CATALOG_network_LINK"] ?>">Перейти на сайт<span class="icon-arrow-right"></span></a></div>
                        </div>
                        <br>
                        </br>
                    </div>
                <? endforeach ?>
            </div>
        </div>
    </div>
</section>
