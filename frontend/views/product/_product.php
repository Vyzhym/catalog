<?php foreach ($product as $item): ?>
<div class="populap__tabs-tovar category__content-item">
    <div class="img">
        <a data-id="<?= $item->id ?>" class="product-select" href="<?= \yii\helpers\Url::to(['product/detailed', 'symbol' => $item->symbol]); ?>"><img src="/images/<?= $item->images->img ?>" alt="<?= $item->description_title ?>" title="<?= $item->description_title ?>"></a>
    </div>
    <div class="name">
        <a data-id="<?= $item->id ?>" class="product-select" href="<?= \yii\helpers\Url::to(['product/detailed', 'symbol' => $item->symbol]); ?>"><?= $item->title_product ?></a>
    </div>
    <div class="price"><span><?= ($item->price != '')?$item->price:'&nbsp;' ?></span><?= ($item->price != '')?" грн":'&nbsp;' ?></div>
    <div class="tover-info">
        <p><?= $item->description_product ?></p>
    </div>
    <div class="hide-options">
        <a data-id="<?= $item->id ?>" class="whare_buy red_btn popap_shops_btn"><?= \frontend\controllers\BaseController::getMessage(5) //Де купити?></a>
        <?php if ($item->id != $_COOKIE['id1'] && $item->id != $_COOKIE['id2'] && $item->id != $_COOKIE['id3']) {
            $class = "add_compare";
            $message = \frontend\controllers\BaseController::getMessage(25);
        } else {
            $class = "dell_block";
            $message = \frontend\controllers\BaseController::getMessage(26);
        }
        ?>
        <a class="compare red_btn <?= $class ?>" data-id="<?= $item->id ?>"><?= $message  ?></a>
        <?php  if($item->new == 1): ?>
            <span class="active_element">Новинка</span>
        <?php endif; ?>
    </div>
</div>

<?php endforeach; ?>

