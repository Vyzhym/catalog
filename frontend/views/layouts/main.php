<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use \frontend\controllers\BaseController;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head rel="canonical">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P3WKT2W');</script>
    <!-- End Google Tag Manager -->

    <?= Html::csrfMetaTags() ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3WKT2W"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php $this->beginBody() ?>
<header>
    <div class="wrapper">
        <nav>
            <ul>
                <li><a href="<?= Url::to(['site/history']); ?>"><?= BaseController::getMessage(1)// Про Moulinex ?></a>
                </li>
                <li>
                    <a href="<?= Url::to(['product/catalog']); ?>"><?= BaseController::getMessage(2)// Мультиварки  ?></a>
                </li>
                <li><a href="<?= Url::to(['site/offers']); ?>"><?= BaseController::getMessage(3)// Акції  ?></a></li>
            </ul>
        </nav>
        <div class="logo">
            <a href="<?= \yii\helpers\Url::to(['site/index']) ?>">
                <img src="/image/CharteLogoMoulinexUA.png" alt="logo">
            </a>
        </div>
        <div class="header__right">
            <div class="compare head_compare">
 <span class="cnt">
                    <?php if (!isset($_COOKIE['cnt'])) {
                        setcookie("cnt","0");
                        echo "0";
                    }else{
                        echo $_COOKIE['cnt'];
                    }?>

     &nbsp;</span>
                <a href="<?= Url::to(['site/compare']); ?>"><p><?= BaseController::getMessage(4)// Порівняти  ?></p></a>
            </div>
            <a href class="where_buy red_btn"
               data-popup-open="popup-shop"><?= BaseController::getMessage(5)// Де придбати  ?></a>
            <div class="language">
                <div class="current"><?= Yii::$app->language ?></div>
                <ul>
                    <?php
                    $url = Yii::$app->request->url;
                    $url = preg_replace('/\/ru\//','', $url);
                    $url = ltrim($url, '\/');
                         ?>
                    <li><a rel=”alternate” hreflang="ua-UA" <?= Yii::$app->language=='ua'?'class=active':'' ?> href="/<?= $url ?>">UA</a></li>
                    <li><a rel=”alternate” hreflang="ru-RU" <?= Yii::$app->language=='ru'?'class=active':'' ?> href="/ru/<?= $url ?>">RU</a></li>
                </ul>
             </div>
            <div class="mobyl-menu">Меню</div>
        </div>
    </div>
</header>
<?php if(Yii::$app->request->url != '/ru/compare' && Yii::$app->request->url != '/ru/compare'):  ?>
<input type="hidden" class="mess25" data-text="<?= BaseController::getMessage(25) ?>">
<input type="hidden" class="mess26" data-text="<?= BaseController::getMessage(26) ?>">
<?php endif;  ?>
<div class="moby__menu">
    <div class="moby__menu-inner">
        <div class="moby__menu-close"><?= BaseController::getMessage(6)// закрити  ?></div>
        <div class="moby__menu-name">Меню</div>
        <div class="moby__menu-nav">
            <ul>
                <li><a href="<?= Url::to(['site/history']); ?>"><?= BaseController::getMessage(1)// Про Moulinex ?></a>
                </li>
                <li>
                    <a href="<?= Url::to(['product/catalog']); ?>"><?= BaseController::getMessage(2)// Мультиварки  ?></a>
                </li>
                <li><a href="<?= Url::to(['site/offers']); ?>"><?= BaseController::getMessage(3)// Акції  ?></a></li>
            </ul>
        </div>
        <div class="moby__menu-compare compare">
            <span class="cnt">
                <?php if (!isset($_COOKIE['cnt'])) {
                    setcookie("cnt","0");
                    echo $_COOKIE['cnt'];
                }else{
                    echo $_COOKIE['cnt'];
                }?>
            </span>
            <p><a href="<?= Url::to(['site/compare']); ?>"><?= BaseController::getMessage(4)// Порівняти  ?></a></p>
        </div>

        <div class="moby__menu-language">
            <ul>
                <li class="active"><a href="#"><?= Yii::$app->language ?></a></li>
                <li class="moby_ua"><a href="/<?= $url ?>">UA</a></li>
                <li class="moby_ru"><a href="/ru/<?= $url ?>">RU</a></li>
            </ul>
        </div>
        <a href class="where_buy red_btn"
           data-popup-open="popup-shop"><?= BaseController::getMessage(5)// Де придбати  ?></a>
    </div>
</div>
<?php echo \yii\helpers\Html:: hiddenInput(Yii::$app->getRequest()->csrfParam, Yii::$app->getRequest()->getCsrfToken(), []); ?>
<?= $content ?>

<footer>
    <div class="wrapper">
        <div class="footer__naw">
            <ul>
                <li><a  rel=nofollow href="<?= BaseController::getService(1) ?>" target="_blank"><?= BaseController::getMessage(94)//Moulinex у світі ?></a></li>
                <li><a  rel=nofollow href="<?= BaseController::getService(2) ?>" target="_blank"><?= BaseController::getMessage(95)//Приєднатися ?></a></li>
                <li><a  rel=nofollow href="<?= BaseController::getService(3) ?>" target="_blank"><?= BaseController::getMessage(96)//Сервісні центри ?></a></li>
                <li><a  rel=nofollow href="<?= BaseController::getService(4) ?>" target="_blank"><?= BaseController::getMessage(97)//Контакти ?></a></li>
                <li><a  rel=nofollow href="<?= BaseController::getService(5) ?>" target="_blank">Groupe SEB</a></li>
                <li><a  rel=nofollow href="<?= BaseController::getService(6) ?>" target="_blank"><?= BaseController::getMessage(98)//Правова інформація ?></a></li>
            </ul>
        </div>
        <div class="footer__social">
            <ul>
                <li><a  rel=nofollow class="item1" href="<?= BaseController::getService(7) ?>" target="_blank"></a></li>
                <li><a  rel=nofollow class="item2" href="<?= BaseController::getService(8) ?>" target="_blank"></a></li>
            </ul>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
