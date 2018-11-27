<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = '404 - Page not found';
?>


<main class="contant">
    <div style="padding: 50px 100px 20px;">
        <h2 style="font-size: 30px;"><?= \frontend\controllers\BaseController::getMessage(119) ?> 404</h2>
        <p><?= \frontend\controllers\BaseController::getMessage(120) ?></p>
        <a style="display: block; margin-top: 50px;" href="/"> < <?= \frontend\controllers\BaseController::getMessage(121) ?></a>
    </div>
</main>
<div class="clearfix"></div>
