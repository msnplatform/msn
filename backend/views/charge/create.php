<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\CreateChargesCodes */

$this->title = Yii::t('app', 'Create Charge');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Charges'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="charge-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="charge-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'number')->textInput() ?>

        <?= $form->field($model, 'amount')->textInput() ?>

        <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
