<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 21.01.2018
 * Time: 21:37
 */
use app\controllers\SiteController;

?>
<div class="content">
    <div class="landscape-and-decor-page">
        <div class="crumbs">
            <ul class="breadcrumbs" itemscope="" itemtype="">
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href=""><span itemprop="name">Ландшафт и декор</span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
        <h1><?= $content['h1'] ?></h1>
        <div class="about-us_our-services">
            <div class="about-us">
                <div>
                    <p><?= $content['model']->text ?></p>
                </div>
                <img class="img-construction" src="/content_images/category/<?= $content['model']->id ?>.1.b.jpg">
            </div>
        </div>
        <div class="internal-news-page">
            <div class="owl-carousel owl-theme">
				<?php for ( $i = 20; $i >= 1; $i -- ) { ?>
					<?php if ( SiteController::url_exists( $content['prot'] . $_SERVER['SERVER_NAME'] . '/content_images/textarea/' . $content['img_id'] . '.' . $i . '.b.jpg' ) ) { ?>
                        <div class="item"><img src="/content_images/textarea/<?= $content['img_id'] ?>.<?= $i ?>.b.jpg">
                        </div>
					<?php } ?>
				<?php } ?>

            </div>
        </div>

        <div class="block-text-landscape four-pluses">
			<?= $content['num_list'] ?>
        </div>
    </div>
</div>
