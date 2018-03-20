<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 20.01.2018
 * Time: 20:01
 */

use yii\widgets\LinkPager;

?>
<div class="content">
    <div class="news-page">
        <div class="crumbs">
            <ul class="breadcrumbs" itemscope="" itemtype="">
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope="" itemtype="">
                    <a class="breadcrumbs-link" itemscope="" itemtype="" itemprop="item"><span
                                itemprop="name">Новости</span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
        <div class="news-shares-contacts">
            <h1>Новости</h1>
            <div class="news">
				<?php foreach ( $content['models'] as $model ) { ?>
                    <div>
                        <img src="/content_images/news/<?= $model->id ?>.1.b.jpg" alt="">
                        <div class="news-text-block">
                            <p class="name-news"><?= $model->title ?></p>
                            <p class="date-news"><?= $model->date ?></p>
                            <p class="text-news"><?= $model->text_short ?></p>
                            <a href="/novosti/<?= $model->alias ?>/">
                                <button>ЧИТАТЬ ДАЛЕЕ</button>
                            </a>
                        </div>
                    </div>
				<?php } ?>
            </div>
            <div class="pagination">
				<?php
				echo LinkPager::widget( [
					'pagination' => $content['pages'],
				] );

				?>
            </div>
        </div>
    </div>

</div>