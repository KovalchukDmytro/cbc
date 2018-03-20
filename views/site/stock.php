<?php
/**
 * Created by PhpStorm.
 * User: koval
 * Date: 21.01.2018
 * Time: 15:15
 */

use yii\widgets\LinkPager;

?>
<div class="content">
    <div class="shares-page">
        <h1>Акции</h1>
        <div class="all-shares">

			<?php foreach ( $content['models'] as $model ) { ?>
                <div>
                    <img src="/content_images/stock/<?= $model->id ?>.1.b.jpg" alt="">
                    <div class="text-shares">
                        <p><?= $model->title ?></p>
                        <a href="/aktsii/<?= $model->alias ?>/">
                            <button>Читать далее</button>
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
