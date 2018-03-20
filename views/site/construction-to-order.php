<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 21.01.2018
 * Time: 21:45
 */
?>
<div class="content">
    <div class="crumbs">
        <ul class="breadcrumbs" itemscope="" itemtype="">
            <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                <meta itemprop="position" content="1">
            </li>
            <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"><span itemprop="name">Строительство под заказ</span></a>
                <meta itemprop="position" content="2">
            </li>
        </ul>
    </div>
    <div class="construction-to-order-page">
        <div class="news-shares-contacts">
            <div class="about-us_our-services">
                <div class="about-us">
                    <img src="/content_images/category/<?= $content['model']->id ?>.1.b.jpg">
                    <h1><span>Строительство</span> под заказ</h1>
                    <p><?= $content['model']->text ?></p>
                </div>
            </div>

            <p>Готовые <span>проекты</span></p>
            <div class="block-ready-projects">
                <div class="rp">
                    <p>Повседневная практика показывает, что укрепление и развитие структуры требуют от нас анализа
                        системы обучения кадров, соответствует насущным потребностям.
                        Повседневная практика показывает, что дальнейшее развитие различных форм деятельности требуют
                        определения и уточнения направлений прогрессивного развития.</p>
                    <a href="/stroitelstvo-pod-zakaz/gotovue-proektu/">
                        <button>УЗНАТЬ БОЛЬШЕ</button>
                    </a>
                </div>
                <div class="owl-carousel owl-theme">
					<?php foreach ( $content['ready-projects'] as $model ) { ?>
                        <div class="item">
                            <img src="/content_images/object/<?= $model->id ?>.1.b.jpg" alt="">
                            <div class="news-text-block">
                                <!--                                <p class="name-news">-->
								<? //=$model->title ?><!--</p>-->
                                <a href="/stroitelstvo-pod-zakaz/gotovue-proektu/<?= $model->alias ?>/">
                                    <button>ПОДРОБНЕЕ</button>
                                </a>
                            </div>
                        </div>
					<?php } ?>
                </div>
            </div>
            <p class="tex-right"><span>Типичные</span> проекты домов</p>
            <div class="block-ready-projects">
                <div class="owl-carousel owl-theme">
					<?php foreach ( $content['tipichnue-proektu-domov'] as $model ) { ?>
                        <div class="item">
                            <a class="example-image-link" href="/content_images/object/<?= $model->id ?>.1.b.jpg"
                               data-lightbox="example-set" data-title="">
                                <img class="example-image" src="/content_images/object/<?= $model->id ?>.2.b.jpg"
                                     alt=""/></a>
                            <div class="news-text-block">
                                <p class="name-news"><?= $model->title ?></p>
                            </div>
                        </div>
					<?php } ?>
                </div>
                <div class="rp">
                    <p>Повседневная практика показывает, что укрепление и развитие структуры требуют от нас анализа
                        системы обучения кадров, соответствует насущным потребностям.
                        Повседневная практика показывает, что дальнейшее развитие различных форм деятельности требуют
                        определения и уточнения направлений прогрессивного развития.</p>
                </div>
            </div>
        </div>
    </div>

</div>
