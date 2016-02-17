<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
$user = Yii::$app->user->identity;
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">CM</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
            <li class="tasks-menu">
                <a href="<?=Yii::$app->homeUrl?>"><i class="glyphicon glyphicon-home"></i> หน้าหลัก</a> 
            </li>
                <!-- User Account: style can be found in dropdown.less -->
                <?php if(!Yii::$app->user->isGuest){ ?> 
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->username; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="http://gravatar.com/avatar/<?= $user->profile->gravatar_id ?>" class="img-circle" alt="<?= $user->username ?>"/>

                            <p>
                                <?php echo Yii::$app->user->identity->username; ?>
                            </p>
                        </li>
                        <!-- Menu Body 
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>-->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(
                                    'ข้อมูลส่วนตัว',
                                    ['/user/settings/profile'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'ออกจากระบบ',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less--> 
                <li>
                    <a href="<?= \yii\helpers\Url::to(['/user/admin/index'])?>"><i class="fa fa-gears"></i></a>
                </li>
            </ul><?php } ?>
        </div>
    </nav>
</header>
