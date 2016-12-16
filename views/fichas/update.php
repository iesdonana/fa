<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ficha */

$this->title = 'Modificar ficha: ' . $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Fichas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titulo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="ficha-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'personas' => $personas,
    ]) ?>

</div>
