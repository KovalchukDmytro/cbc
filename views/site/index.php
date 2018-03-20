<?php

/* @var $this yii\web\View */

?>

<div class="content">
    <div class="main-block">
        <div>
            <h1>Central Building Company</h1>
            <p>Лучшая украинская строительная компания,<br>выполняющая проекты на заказ</p>
            <a href="/o-nas/">
                <button class="more-info">Подробнее</button>
            </a>
        </div>
    </div>

    <div class="about-us_our-services">
        <img src="images/content-bg.png">

        <div class="our-services">
            <p>Наши <span>услуги</span></p>
            <div class="blocks-services first">
                <a href="/stroitelstvo-pod-zakaz/">
                    <div class="block-text">
                        <p>Строительство<br>под заказ</p>
                        <p>Наша компания занимается строительством под заказ, качеством которых мы можем гордиться</p>
                    </div>
                </a>
                <a href="/stroitelnue-rabotu/">
                    <div class="block-text">
                        <p>Строительные<br>работы</p>
                        <p>Наша компания занимается строительством под заказ, качеством которых мы можем гордиться</p>
                    </div>
                </a>
            </div>

            <div class="blocks-services second">
                <a href="/landshaft-i-dekor/">
                    <div class="block-text">
                        <p>Ландшафт и<br>декор</p>
                        <p>Наша компания занимается строительством под заказ, качеством которых мы можем гордиться</p>
                    </div>
                </a>
                <a href="/design/">
                    <div class="block-text">
                        <p>Проектирование<br>и дизайн</p>
                        <p>Наша компания занимается строительством под заказ, качеством которых мы можем гордиться</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="about-us">
            <div>
                <p><span>Про</span> компанию</p>
                <p>Строительная компания выполняет различные виды строительных и ремонтных работ –начиная от возведения
                    фундамента здания и заканчивая выполнением чистовых отделочных работ.
                    Наши возможности позволяют нам браться даже за сложные и необычные проекты, выполняя все пожелания
                    заказчика.</p>
            </div>
            <img src="images/pexels-photo.jpeg">
        </div>
    </div>

    <div class="ready-projects">
        <div class="xxx">
            <p>Просмотрите все готовые проекты<br>в нашем портфолио</p>
            <a href="/stroitelstvo-pod-zakaz/gotovue-proektu/">
                <button>Перейти</button>
            </a>
        </div>
    </div>

    <div class="feedback-partners">
        <div class="feedback">
            <p><span>Отзывы</span> клиентов</p>
            <div class="owl-carousel owl-theme">
				<?php foreach ( $content['review'] as $model ) { ?>
                    <div class="item">
                        <img width="40" src="/images/quotes.png">
                        <div class="owl-content">
                            <p><?= $model->text ?></p>
                            <span><?= $model->name ?></span>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
    </div>

    <div class="our-indicators">
        <div class="our-indicators-content">
            <p>Наши показатели</p>
            <div class="numbers" id="counts">
                <div class="block-font">
                    <p class="spincrement">36</p>
                    <p>успешно завершенных<br>проектов</p>
                </div>
                <div class="block-font">
                    <p class="spincrement">7</p>
                    <p>лет на Украинском рынке</p>
                </div>
                <div class="block-font">
                    <p class="spincrement">42</p>
                    <p>профессиональных<br>сотрудника в компании</p>
                </div>
                <div class="block-font">
                    <p class="spincrement">12</p>
                    <p>бригад работников,<br>без страха сложностей</p>
                </div>
            </div>
        </div>
    </div>

    <div class="news-shares-contacts">

    </div>
</div>
