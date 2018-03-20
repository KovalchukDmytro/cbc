<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 21.01.2018
 * Time: 21:28
 */
use app\controllers\SiteController;

?>

<div class="content">
    <div class="design-page">
        <div class="crumbs">
            <ul class="breadcrumbs" itemscope="" itemtype="">
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href=""><span itemprop="name">Проектирование и дизайн</span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
        <div class="news-shares-contacts">
            <div class="about-us_our-services">
                <div class="about-us">
                    <img src="/content_images/category/<?= $content['model_p']->id ?>.1.b.jpg">
                    <h1><span>Проектирование</span></h1>
                    <p><?= $content['model_p']->text ?></p>
                </div>
            </div>
        </div>
        <div class="four-pluses">
			<?= $content['num_list_p'] ?>
        </div>
        <div class="internal-news-page">
            <div class="owl-carousel owl-theme">
				<?php for ( $i = 20; $i >= 1; $i -- ) { ?>
					<?php if ( SiteController::url_exists( $content['prot'] . $_SERVER['SERVER_NAME'] . '/content_images/textarea/' . $content['planning_img_id'] . '.' . $i . '.b.jpg' ) ) { ?>
                        <div class="item"><img
                                    src="/content_images/textarea/<?= $content['planning_img_id'] ?>.<?= $i ?>.b.jpg">
                        </div>
					<?php } ?>
				<?php } ?>

            </div>
        </div>
    </div>

    <div class="design-page">
        <div class="news-shares-contacts">
            <div class="about-us_our-services">
                <div class="about-us">
                    <img src="/content_images/category/<?= $content['model_d']->id ?>.1.b.jpg">
                    <span class="like-h1">Дизайн</span>
                    <p><?= $content['model_d']->text ?></p>
                </div>
            </div>
        </div>
        <div class="four-pluses">
			<?= $content['num_list_d'] ?>

        </div>
        <div class="internal-news-page">
            <div class="owl-carousel owl-theme">
				<?php for ( $i = 20; $i >= 1; $i -- ) { ?>
					<?php if ( SiteController::url_exists( $content['prot'] . $_SERVER['SERVER_NAME'] . '/content_images/textarea/' . $content['design_img_id'] . '.' . $i . '.b.jpg' ) ) { ?>
                        <div class="item"><img
                                    src="/content_images/textarea/<?= $content['design_img_id'] ?>.<?= $i ?>.b.jpg">
                        </div>
					<?php } ?>
				<?php } ?>
            </div>
        </div>
    </div>
</div>

