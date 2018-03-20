<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 23.01.2018
 * Time: 20:33
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
				<?php if ( ! empty( $content['bread'][0] ) ) { ?>
                    <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
						<?php if ( ! empty( $content['bread'][1] ) ) { ?>
                            <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"
                               href="/<?= $content['bread'][0]['alias'] ?>/"><span
                                        itemprop="name"><?= $content['bread'][0]['title'] ?></span></a>
						<?php } else { ?>
                            <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"><span
                                        itemprop="name"><?= $content['bread'][0]['title'] ?></span></a>
						<?php } ?>
                        <meta itemprop="position" content="2">
                    </li>
				<?php } ?>
				<?php if ( ! empty( $content['bread'][1] ) ) { ?>
                    <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
						<?php if ( ! empty( $content['bread'][2] ) ) { ?>
                            <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"
                               href="/<?= $content['bread'][0]['alias'] ?>/<?= $content['bread'][1]['alias'] ?>/"><span
                                        itemprop="name"><?= $content['bread'][1]['title'] ?></span></a>
						<?php } else { ?>
                            <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"><span
                                        itemprop="name"><?= $content['bread'][1]['title'] ?></span></a>
						<?php } ?>
                        <meta itemprop="position" content="3">
                    </li>
				<?php } ?>
				<?php if ( ! empty( $content['bread'][2] ) ) { ?>
                    <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
						<?php if ( ! empty( $content['bread'][3] ) ) { ?>
                            <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"
                               href="/<?= $content['bread'][0]['alias'] ?>/<?= $content['bread'][1]['alias'] ?>/<?= $content['bread'][2]['alias'] ?>/"><span
                                        itemprop="name"><?= $content['bread'][2]['title'] ?></span></a>
						<?php } else { ?>
                            <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"><span
                                        itemprop="name"><?= $content['bread'][2]['title'] ?></span></a>
						<?php } ?>
                        <meta itemprop="position" content="3">
                    </li>
				<?php } ?>
            </ul>
        </div>
        <div class="news-shares-contacts">
            <div class="about-us_our-services">
                <div class="about-us">
                    <img src="/content_images/object/<?= $content['model']->id ?>.1.b.jpg">
                    <span><?= SiteController::dateView( $content['model']->date ) ?></span>
                    <h1><?= $content['model']->title ?></h1>
					<?= $content['model']->text ?>
                </div>
            </div>
        </div>
        <div style="clear:both;margin:20px 0;"></div>
        <div class="owl-carousel owl-theme">
			<?php for ( $i = $content['img_num']; $i >= 2; $i -- ) { ?>
				<?php if ( SiteController::url_exists( $content['prot'] . $_SERVER['SERVER_NAME'] . '/content_images/object/' . $content['model']->id . '.' . $i . '.b.jpg' ) ) { ?>
                    <div class="item"><img src="/content_images/object/<?= $content['model']->id ?>.<?= $i ?>.b.jpg">
                    </div>
				<?php } ?>
			<?php } ?>

        </div>
        <div>
			<?= $content['model']->text_bot ?>
        </div>
    </div>
</div>
