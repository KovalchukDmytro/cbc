<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 21.01.2018
 * Time: 15:15
 */
?>

<div class="content">
    <div class="internal-shares-page">
        <div class="crumbs">
            <ul class="breadcrumbs" itemscope="" itemtype="">
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href="/aktsii/"><span
                                itemprop="name">Акции</span></a>
                    <meta itemprop="position" content="2">
                </li>
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"><span
                                itemprop="name"><?= $content['model']->title ?></span></a>
                    <meta itemprop="position" content="3">
                </li>
            </ul>
        </div>
        <div class="about-us_our-services">
            <div class="about-us">
                <div>
                    <span>C <?= $content['model']->date_begin ?> по <?= $content['model']->date_end ?></span>
                    <h1><?= $content['model']->title ?></h1>
					<?= $content['model']->text ?>
                </div>
                <img src="/content_images/stock/<?= $content['model']->id ?>.1.b.jpg">
            </div>
        </div>
    </div>

</div>
