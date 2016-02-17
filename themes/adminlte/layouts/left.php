<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel 
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <!-- search form 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'เมนู', 'options' => ['class' => 'header']],
                    //['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    //['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'เข้าสู่ระบบ', 'icon' => 'fa fa-user', 'url' => ['/user/security/login'], 'visible' => Yii::$app->user->isGuest],
                    /*[
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],*/
                    [
                        'label' => 'จัดลำดับตามคะแนน',
                        'icon' => 'glyphicon glyphicon-list-alt',
                        'url' => '#',
                        'items' => [
                            ['label' => 'จัดลำดับอำเภอ', 'icon' => 'fa fa-circle-o', 'url' => ['/kpiresult/scoreampur'],],
                            ['label' => 'จัดลำดับหน่วยงาน', 'icon' => 'fa fa-circle-o', 'url' => ['/kpiresult/scorechangwat'],],
                            ['label' => 'จัดลำดับหน่วยงานภายในอำเภอ', 'icon' => 'fa fa-circle-o', 'url' => ['/kpiresult/scorehosp'],],
                            ['label' => 'จัดลำดับตามขนาดประชากร', 'icon' => 'fa fa-circle-o', 'url' => ['/kpiresult/scorearea'],],
                            //['label' => 'เปรียบเทียบตามตัวชี้วัด', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            ['label' => 'แผนภูมิเทียบคะแนน', 'icon' => 'fa fa-bar-chart-o', 'url' => ['/site/chart'],'template' => '<a href="{url}">{icon}{label} <span class="label label-success">New</span></a>'],
                        ],
                        'visible' => Yii::$app->user->identity
                    ],
                    [
                        'label' => 'จัดลำดับตามตัวชี้วัด',
                        'icon' => 'fa fa-area-chart',
                        'url' => '#',
                        'items' => [
                            ['label' => 'จัดลำดับอำเภอ', 'icon' => 'fa fa-circle-o', 'url' => ['/kpiresult/kpiampur'],],
                            ['label' => 'จัดลำดับหน่วยงาน', 'icon' => 'fa fa-circle-o', 'url' => ['/kpiresult/changwat'],],
                            ['label' => 'จัดลำดับหน่วยงานภายในอำเภอ', 'icon' => 'fa fa-circle-o', 'url' => ['/kpiresult/ampur'],],
                            ['label' => 'จัดลำดับตามขนาดประชากร', 'icon' => 'fa fa-circle-o', 'url' => ['/kpiresult/area'],],
                            //['label' => 'เปรียบเทียบตามตัวชี้วัด', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                            ['label' => 'แผนภูมิเทียบตัวชี้วัด', 'icon' => 'fa fa-bar-chart-o', 'url' => ['/site/chartkpi'],'template' => '<a href="{url}">{icon}{label} <span class="label label-success">New</span></a>'],
                        ],
                        'visible' => Yii::$app->user->identity
                    ],
                    ['label' => 'สรุปผลงานหน่วยบริการ', 'icon' => 'glyphicon glyphicon-eye-open', 'url' => ['/kpisummarise/selectamp'],'template' => '<a href="{url}">{icon}{label} <span class="label label-success">New</span></a>','visible' => Yii::$app->user->identity],
//                    [
//                        'label' => 'รายละเอียดตัวชี้วัด',
//                        'icon' => 'fa fa-pencil-square-o',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'ตัวชี้วัดที่ใช้เปรียบเทียบปี 2559', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                            ['label' => 'รายงานตัวชี้วัด', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                            ['label' => 'Chart', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                        ]
//                    ],
//                    ['label' => 'จัดการตัวชี้วัด', 'icon' => 'fa fa-pencil', 'url' => ['/kpi/index'],'visible' => Yii::$app->user->identity],
//                    ['label' => 'SQL Script Query','icon'=>'fa fa-search', 'url' => ['/runquery/index'],'visible' => Yii::$app->user->identity],
                    ['label' => 'เกี่ยวกับระบบ', 'icon' => 'fa fa-desktop', 'url' => ['/site/about'],],

                ],
            ]
        ) ?>

    </section>

</aside>
