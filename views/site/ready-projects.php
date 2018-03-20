<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 23.01.2018
 * Time: 21:23
 */

use yii\widgets\LinkPager;

?>
<div class="content">
    <div class="finished-projects-page">
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
            </ul>
        </div>
        <h1>Готовые <span>проекты</span></h1>
        <div class="news-shares-contacts">
            <div class="shares">
				<?php foreach ( $content['models'] as $model ) { ?>
                    <div>
                        <img src="/content_images/object/<?= $model->id ?>.1.b.jpg" alt="">
                        <div class="news-text-block">
                            <p class="name-news"><?= $model->title ?></p>
                            <!--                            <p class="text-news">-->
							<? //=$model->text_short ?><!--</p>-->
                            <a href="/stroitelstvo-pod-zakaz/gotovue-proektu/<?= $model->alias ?>/">
                                <button>ЧИТАТЬ ДАЛЕЕ</button>
                            </a>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
        <div class="pagination">
			<?php
			echo LinkPager::widget( [
				'pagination' => $content['pages'],
			] );

			?>
        </div>
        <div class="block-text-landscape">
            <p>Разнообразный и богатый опыт новая модель организационной деятельности обеспечивает широкому кругу
                (специалистов) участие в формировании систем массового участия.
                С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности способствует
                подготовки и реализации существенных финансовых и административных условий.
                Значимость этих проблем настолько очевидна, что новая модель организационной деятельности обеспечивает
                широкому кругу (специалистов) участие в формировании систем массового участия. </p>
            <p>Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции
                позволяет выполнять важные задания по разработке существенных финансовых и
                административных условий. С другой стороны сложившаяся структура организации способствует подготовки и
                реализации модели развития. Равным образом дальнейшее развитие различных форм
                деятельности влечет за собой процесс внедрения и модернизации систем массового участия. Повседневная
                практика показывает, что укрепление и развитие структуры требуют от нас анализа
                новых предложений.</p>
        </div>
    </div>
</div>
