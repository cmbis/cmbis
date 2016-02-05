<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<!-- Main content -->
<section class="content">

    <div class="jumbotron">
      <h1><?=Html::img(Url::base().'/img/Curious-Minion-Icon.png')?><?= Html::encode($this->title) ?></h1>
      <p class="text-red"><?= nl2br(Html::encode($message)) ?></p>
    </div>

</section>
