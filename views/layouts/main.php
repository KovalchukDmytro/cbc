<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register( $this );
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
	<?= Html::csrfMetaTags() ?>
    <title><?= Html::encode( $this->title ) ?></title>
	<?php $this->head() ?>
    <meta name=viewport content="width=device-width, initial-scale=1">
</head>
<body>
<?php $this->beginBody() ?>
<div id="header">
    <div class="block-header">
        <div class="block-header-content">
            <a href="/"><img class="logo" src="/images/cbc-logo-g.png"></a>
            <ul class="main-menu">
                <li><a href="/o-nas/">О нас</a></li>
                <li><a href="/stroitelstvo-pod-zakaz/">Строительство<br>под заказ</a></li>
                <li><a href="/stroitelnue-rabotu/">Строительные<br>работы</a></li>
                <li><a href="/landshaft-i-dekor/">Ландшафт<br>и декор</a></li>
                <li><a href="/design/">Проектирование<br>и дизайн</a></li>
                <li><a href="/portfolio/">Портфолио</a></li>
                <li><a href="/contacts/">Контакты</a></li>
            </ul>

            <nav class="menu-top-box">
                <div class="open-menu"></div>
                <div class="full_menu">
                    <div class="menu_head">
                        <div class="logo">
                            <img width="100" src="/images/cbc-logo-g.png">
                        </div>
                        <div class="close_menu"></div>
                    </div>
                    <ul class="menu-top">
                        <li><a href="/o-nas/">О нас</a></li>
                        <li><a href="/stroitelstvo-pod-zakaz/">Строительство под заказ</a></li>
                        <li><a href="/stroitelnue-rabotu/">Строительные работы</a></li>
                        <li><a href="/landshaft-i-dekor/">Ландшафт и декор</a></li>
                        <li><a href="/design/">Проектирование и дизайн</a></li>
                        <li><a href="/portfolio/">Портфолио</a></li>
                        <li><a href="/contacts/">Контакты</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>


<!-- /HEADER -->

<?= $content ?>
<div class="block-our-contacts">
    <p>Наши <span>контакты</span></p>
    <div class="contacts">
        <form id="send-mas">
            <input type="text" name="name" required placeholder="Напишите Ваше имя...">
            <input type="tel" title="099-999-99-99" placeholder="Напишите номер телефона..." name="phone" required
                   pattern="0[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" size="13">
            <input class="button-send" type="submit" value="ЗАКАЗАТЬ КОНСУЛЬТАЦИЮ">
        </form>

        <div id="modal_form">
            <span id="modal_close"></span>
            <p>Спасибо, что написали нам!</p>
            <p>Вскоре мы свяжемся с вами</p>
        </div>
        <div id="overlay"></div>

        <div class="block-contacts">
            <p><span>Адрес:</span></p>
            <p>г.Киев, ул.Крещатик, 1</p>
            <br>
            <p><span>Телефоны:</span></p>
            <p>+38 (099) 222 22 22</p>
            <p>+38 (067) 000 99 99</p>
        </div>
        <div class="block-contacts">
            <p><span>E-mail:</span></p>
            <a href="mailto:info@cbc.com.ua"><p>info@cbc.com.ua</p></a>
        </div>
    </div>
</div>
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10161.74300157056!2d30.520543062102554!3d50.45160987493049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce51d7228f77%3A0x38faaea54082e7cc!2z0LLRg9C70LjRhtGPINCl0YDQtdGJ0LDRgtC40LosIDEsINCa0LjRl9CyLCAwMjAwMA!5e0!3m2!1sru!2sua!4v1516010195978"
            width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!-- FOOTER -->
<div id="footer">
    <div class="footer-info">
        <img src="/images/cbc-logo-g.png" alt="">
        <div>
            <p>Пн-Сб: 9.00-18.00</p><br>
            <p>г.Киев, ул.Крещатик 1</p><br>
            <p>+38 (099) 222 22 22</p>
            <p>+38 (067) 000 99 99</p>
        </div>
        <div>
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/o-nas/">О нас</a></li>
                <li><a href="/contacts/">Контакты</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="/stroitelstvo-pod-zakaz/">Строительство под заказ</a></li>
                <li><a href="/stroitelnue-rabotu/">Строительные работы</a></li>
                <li><a href="/landshaft-i-dekor/">Ландшафт и декор</a></li>
                <li><a href="/design/">Проектрирование и дизайн</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- /FOOTER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
