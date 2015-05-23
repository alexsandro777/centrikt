<?php
/**
 * Created by PhpStorm.
 * User: YsWaY
 * Date: 17.03.15
 * Time: 5:28
 */

use yii\helpers\Html;

$this->title='Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Создать',['/administrator/create'],['class'=>'btn btn-primary']) ?>
</div>