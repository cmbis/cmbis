<?php

/* 
 * This file is part of the Dektrium project
 * 
 * (c) Dektrium project <http://github.com/dektrium>
 * 
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\Nav;

?>

<?= Nav::widget([
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px'
    ],
    'items' => [
        [
            'label'   => Yii::t('user', 'Users'),
            'url'     => ['/user/admin/index'],
        ],
        [
            'label' => Yii::t('user', 'Roles'),
            'url'   => ['/admin/role/index'],
            'visible' => isset(Yii::$app->extensions['mdmsoft/yii2-admin']),
        ],
        [
            'label' => Yii::t('user', 'Permissions'),
            'url'   => ['/admin/permission/index'],
            'visible' => isset(Yii::$app->extensions['mdmsoft/yii2-admin']),
        ],
        [
            'label' => Yii::t('user', 'Assignment'),
            'url'   => ['/admin/assignment/index'],
            'visible' => isset(Yii::$app->extensions['mdmsoft/yii2-admin']),
        ],
        [
            'label' => Yii::t('user', 'Create'),
            'items' => [
                [
                    'label'   => Yii::t('user', 'New user'),
                    'url'     => ['/user/admin/create'],
                ],
                [
                    'label' => Yii::t('user', 'New role'),
                    'url'   => ['/admin/role/create'],
                    'visible' => isset(Yii::$app->extensions['mdmsoft/yii2-admin']),
                ],
                [
                    'label' => Yii::t('user', 'New permission'),
                    'url'   => ['/admin/permission/create'],
                    'visible' => isset(Yii::$app->extensions['mdmsoft/yii2-admin']),
                ]
            ]
        ]
    ]
]) ?>
