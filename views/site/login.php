<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\LoginAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
LoginAsset::register($this);
$this->title = 'Login';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="wrap">

        <div class="container">

                <?php $form = ActiveForm::begin([
                    'options' => ['class' => 'form-signin'],
                    'fieldConfig' => [
                        'template' => "{label}{input}{error}",
                        'labelOptions' => ['class' => 'sr-only'],
                    ],
                ]); ?>
                    <h2 class='form-signin-heading'>Please sign in</h2>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control']) ?>

                    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control']) ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                    ]) ?>

                    <?= Html::submitButton('Login', ['class' => 'btn  btn-lg btn-block btn-primary', 'name' => 'login-button']) ?>

                <?php ActiveForm::end(); ?>

        </div>
    </div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

