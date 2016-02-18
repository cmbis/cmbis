<?php
namespace app\controllers;

use Yii;
use app\models\LoginForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionChart()
    {
        $sql = "SELECT a.AMP,h.Amp_Des, round(avg(a.kpi_score),2) as avgScore 
FROM cmbis_kpi_result_amp a
INNER JOIN cmbis_area_hosp h ON h.AMP=a.amp 
GROUP BY a.amp 
ORDER BY avgScore DESC ";
$rawData = Yii::$app->db->createCommand($sql)->queryAll();
$main_data = [];
foreach ($rawData as $data) {
    $main_data[] = [
        'name' => $data['Amp_Des'],
        'y' => $data['avgScore'] * 1,
        'drilldown' => $data['AMP']
    ];
}
$main = json_encode($main_data);
$sql = "SELECT a.AMP,a.Amp_Des,a.Hosp,a.Hosp_des ,round(avg(h.kpi_score),2) as avgScore
FROM cmbis_kpi_result_hcode h
INNER JOIN cmbis_area_hosp a ON a.Hosp=h.hcode
#WHERE a.AMP='5001'
GROUP BY h.hcode
ORDER BY avgScore DESC";
$rawData = Yii::$app->db->createCommand($sql)->queryAll();
foreach ($rawData as $data) {
    if($data['AMP']=='5001'){
        $a5001[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5002'){
        $a5002[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5003'){
        $a5003[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5004'){
        $a5004[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5005'){
        $a5005[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5006'){
        $a5006[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5007'){
        $a5007[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5008'){
        $a5008[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5009'){
        $a5009[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5010'){
        $a5010[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5011'){
        $a5011[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5012'){
        $a5012[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5013'){
        $a5013[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5014'){
        $a5014[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5015'){
        $a5015[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5016'){
        $a5016[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5017'){
        $a5017[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5018'){
        $a5018[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5019'){
        $a5019[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5020'){
        $a5020[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5021'){
        $a5021[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5022'){
        $a5022[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5023'){
        $a5023[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5024'){
        $a5024[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5025'){
        $a5025[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
}
$sub_a5001 = json_encode($a5001);
$sub_a5002 = json_encode($a5002);
$sub_a5003 = json_encode($a5003);
$sub_a5004 = json_encode($a5004);
$sub_a5005 = json_encode($a5005);
$sub_a5006 = json_encode($a5006);
$sub_a5007 = json_encode($a5007);
$sub_a5008 = json_encode($a5008);
$sub_a5009 = json_encode($a5009);
$sub_a5010 = json_encode($a5010);
$sub_a5011 = json_encode($a5011);
$sub_a5012 = json_encode($a5012);
$sub_a5013 = json_encode($a5013);
$sub_a5014 = json_encode($a5014);
$sub_a5015 = json_encode($a5015);
$sub_a5016 = json_encode($a5016);
$sub_a5017 = json_encode($a5017);
$sub_a5018 = json_encode($a5018);
$sub_a5019 = json_encode($a5019);
$sub_a5020 = json_encode($a5020);
$sub_a5021 = json_encode($a5021);
$sub_a5022 = json_encode($a5022);
$sub_a5023 = json_encode($a5023);
$sub_a5024 = json_encode($a5024);
$sub_a5025 = json_encode($a5025);
        return $this->render('chart',[
            'main' => $main,
            'sub_a5001' => $sub_a5001,
            'sub_a5002' => $sub_a5002,
            'sub_a5003' => $sub_a5003,
            'sub_a5004' => $sub_a5004,
            'sub_a5005' => $sub_a5005,
            'sub_a5006' => $sub_a5006,
            'sub_a5007' => $sub_a5007,
            'sub_a5008' => $sub_a5008,
            'sub_a5009' => $sub_a5009,
            'sub_a5010' => $sub_a5010,
            'sub_a5011' => $sub_a5011,
            'sub_a5012' => $sub_a5012,
            'sub_a5013' => $sub_a5013,
            'sub_a5014' => $sub_a5014,
            'sub_a5015' => $sub_a5015,
            'sub_a5016' => $sub_a5016,
            'sub_a5017' => $sub_a5017,
            'sub_a5018' => $sub_a5018,
            'sub_a5019' => $sub_a5019,
            'sub_a5020' => $sub_a5020,
            'sub_a5021' => $sub_a5021,
            'sub_a5022' => $sub_a5022,
            'sub_a5023' => $sub_a5023,
            'sub_a5024' => $sub_a5024,
            'sub_a5025' => $sub_a5025,
        ]);
    }

    public function actionChartkpi()
    {
        $kpi = '%';

        if (!empty($_GET['kpi'])) {
            $kpi = $_GET['kpi'];
        }
        $sql = "SELECT a.AMP,h.Amp_Des, round(avg(a.kpi_percen_result),2) as avgScore 
FROM cmbis_kpi_result_amp a
INNER JOIN cmbis_area_hosp h ON h.AMP=a.amp 
WHERE kpi_id like '".$kpi."'
GROUP BY a.amp 
ORDER BY avgScore DESC ";
$rawData = Yii::$app->db->createCommand($sql)->queryAll();
$main_data = [];
foreach ($rawData as $data) {
    $main_data[] = [
        'name' => $data['Amp_Des'],
        'y' => $data['avgScore'] * 1,
        'drilldown' => $data['AMP']
    ];
}
$main = json_encode($main_data);
$sql = "SELECT a.AMP,a.Amp_Des,a.Hosp,a.Hosp_des ,round(avg(h.kpi_percen_result),2) as avgScore
FROM cmbis_kpi_result_hcode h
INNER JOIN cmbis_area_hosp a ON a.Hosp=h.hcode
WHERE h.kpi_id like '".$kpi."'
GROUP BY h.hcode
ORDER BY avgScore DESC";
$rawData = Yii::$app->db->createCommand($sql)->queryAll();
foreach ($rawData as $data) {
    if($data['AMP']=='5001'){
        $a5001[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5002'){
        $a5002[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5003'){
        $a5003[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5004'){
        $a5004[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5005'){
        $a5005[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5006'){
        $a5006[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5007'){
        $a5007[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5008'){
        $a5008[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5009'){
        $a5009[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5010'){
        $a5010[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5011'){
        $a5011[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5012'){
        $a5012[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5013'){
        $a5013[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5014'){
        $a5014[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5015'){
        $a5015[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5016'){
        $a5016[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5017'){
        $a5017[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5018'){
        $a5018[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5019'){
        $a5019[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5020'){
        $a5020[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5021'){
        $a5021[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5022'){
        $a5022[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5023'){
        $a5023[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5024'){
        $a5024[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
    if($data['AMP']=='5025'){
        $a5025[] = [$data['Hosp_des'],$data['avgScore']*1];
    }
}
$sub_a5001 = json_encode($a5001);
$sub_a5002 = json_encode($a5002);
$sub_a5003 = json_encode($a5003);
$sub_a5004 = json_encode($a5004);
$sub_a5005 = json_encode($a5005);
$sub_a5006 = json_encode($a5006);
$sub_a5007 = json_encode($a5007);
$sub_a5008 = json_encode($a5008);
$sub_a5009 = json_encode($a5009);
$sub_a5010 = json_encode($a5010);
$sub_a5011 = json_encode($a5011);
$sub_a5012 = json_encode($a5012);
$sub_a5013 = json_encode($a5013);
$sub_a5014 = json_encode($a5014);
$sub_a5015 = json_encode($a5015);
$sub_a5016 = json_encode($a5016);
$sub_a5017 = json_encode($a5017);
$sub_a5018 = json_encode($a5018);
$sub_a5019 = json_encode($a5019);
$sub_a5020 = json_encode($a5020);
$sub_a5021 = json_encode($a5021);
$sub_a5022 = json_encode($a5022);
$sub_a5023 = json_encode($a5023);
$sub_a5024 = json_encode($a5024);
$sub_a5025 = json_encode($a5025);
        return $this->render('chartkpi',[
            'main' => $main,'kpi' => $kpi,
            'sub_a5001' => $sub_a5001,
            'sub_a5002' => $sub_a5002,
            'sub_a5003' => $sub_a5003,
            'sub_a5004' => $sub_a5004,
            'sub_a5005' => $sub_a5005,
            'sub_a5006' => $sub_a5006,
            'sub_a5007' => $sub_a5007,
            'sub_a5008' => $sub_a5008,
            'sub_a5009' => $sub_a5009,
            'sub_a5010' => $sub_a5010,
            'sub_a5011' => $sub_a5011,
            'sub_a5012' => $sub_a5012,
            'sub_a5013' => $sub_a5013,
            'sub_a5014' => $sub_a5014,
            'sub_a5015' => $sub_a5015,
            'sub_a5016' => $sub_a5016,
            'sub_a5017' => $sub_a5017,
            'sub_a5018' => $sub_a5018,
            'sub_a5019' => $sub_a5019,
            'sub_a5020' => $sub_a5020,
            'sub_a5021' => $sub_a5021,
            'sub_a5022' => $sub_a5022,
            'sub_a5023' => $sub_a5023,
            'sub_a5024' => $sub_a5024,
            'sub_a5025' => $sub_a5025,
        ]);
    }


    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
