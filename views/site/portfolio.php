<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 22.01.2018
 * Time: 23:32
 */
?>
<div class="content">
    <div class="construction-work-page">
        <div class="crumbs">
            <ul class="breadcrumbs" itemscope="" itemtype="">
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"><span
                                itemprop="name">Портфолио</span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
        <h1><?= $h1 ?></h1>
        <div class="news-shares-contacts">
            <div class="shares">

				<?php foreach ( $objects as $object ) { ?>
                    <div class="portfolio-item">
                        <a class="example-image-link" href="/content_images/object/<?= $object->id ?>.1.b.jpg"
                           data-lightbox="example-set" data-title="<?= $object->title ?>">
                            <img src="/content_images/object/<?= $object->id ?>.1.b.jpg" alt="">
                        </a>
                    </div>
				<?php } ?>
            </div>
        </div>
    </div>


</div>