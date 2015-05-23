<?php
/**
 * Created by PhpStorm.
 * User: YsWaY
 * Date: 18.03.15
 * Time: 3:22
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use vova07\imperavi\Widget;


$this->title='Создание новости';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'create-news']); ?>
        <?= $form->field($model,'id') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'description')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen'
                ]
            ]
        ]); ?>
        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-primary', 'name' => 'create-news-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

