<?php
$this->title = \frontend\controllers\BaseController::getMessage(3);// Акції
echo \yii\helpers\Html:: hiddenInput(Yii::$app->getRequest()->csrfParam, Yii::$app->getRequest()->getCsrfToken(), []);
?>

<main class="contant">
    <div class="wrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?= \yii\helpers\Url::home(); ?>"><?= \frontend\controllers\BaseController::getMessage(37) //Домашня сторінка ?></a></li>
                <li><a href=""><?= \frontend\controllers\BaseController::getMessage(3)// Акції  ?></a></li>
            </ul>
        </div>
    </div>

    <h1 class="title"><?= \frontend\controllers\BaseController::getMessage(3)// Акції  ?></h1>
    <?php if(empty($offers)):?>
    <div class="wrapper">
        <h2 class="title"><?= \frontend\controllers\BaseController::getMessage(176)// На даний момент актуальні акції відсутні  ?></h2>
    </div>
    <?php else:?>
    <section class="action__posts">
        <div class="wrapper">
            <?php foreach ($offers as $item): ?>
                <a <?= (!empty($item['link']) && $item['chekbox'] == 1) ? "href=" . $item['link'] : ''; ?>
                        class="action__posts-item <?= ($item['chekbox'] == 2) ? 'popap_offers_btn' : ""; ?>"
                        data-id="<?= $item['id'] ?>">
                    <img src="/images/<?= $item['images']->img ?>" alt="action">
                    <div class="action__posts-info">
                        <div class="action__posts-title"><?= $item['title'] ?></div>
                        <div class="action__posts-text">

                            <p><?= $item['description'] ?></p>
                        </div>
                        <?php if($item['pre_description']!= ''): ?>
                        <div class="action__posts-data"><?= $item['pre_description'] ?></div>
                    <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>

            <div class="important-info">
                <span>*</span><?= \frontend\controllers\BaseController::getMessage(66)//Акція діє на території України у офіційних партнерів «Себ груп» ?>
            </div>
        </div>
    </section>
    <?php endif;?>

</main>

    <div class="popup_mod popup_offers" data-popup="popup-shop">    <div class="popup-inner">            <div class="popup__shop-block">             <ul class="popup_list">            </ul>        </div>        <a class="popup-close" data-popup-close="popup-shop" href=""></a>        <a class="popup-close popup-close-mobyl" data-popup-close="popup-shop" href=""><?= \frontend\controllers\BaseController::getMessage(65)// повернутися  ?></a>    </div></div>



<?= \app\components\ShopWidget::widget() ?>