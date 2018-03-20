<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 20.01.2018
 * Time: 14:47
 */

use app\controllers\SiteController;

?>
<div class="content">
    <div class="internal-news-page">
        <div class="crumbs">
            <ul class="breadcrumbs" itemscope="" itemtype="">
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href="/novosti/"><span
                                itemprop="name">Новости</span></a>
                    <meta itemprop="position" content="2">
                </li>
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"><span
                                itemprop="name"><?= $content['model']->title ?></span></a>
                    <meta itemprop="position" content="3">
                </li>
            </ul>
        </div>
        <div class="news-shares-contacts">
            <div class="about-us_our-services">
                <div class="about-us">
                    <img src="/content_images/news/<?= $content['model']->id ?>.1.b.jpg">
                    <span><?= $content['model']->date ?></span>
                    <h1><?= $content['model']->title ?></h1>
					<?= $content['model']->text ?>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
			<?php for ( $i = $content['img_num']; $i >= 2; $i -- ) { ?>
				<?php if ( SiteController::url_exists( $content['prot'] . $_SERVER['SERVER_NAME'] . '/content_images/news/' . $content['model']->id . '.' . $i . '.b.jpg' ) ) { ?>
                    <div class="item"><img src="/content_images/news/<?= $content['model']->id ?>.<?= $i ?>.b.jpg">
                    </div>
				<?php } ?>
			<?php } ?>

        </div>
    </div>
</div>