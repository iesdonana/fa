<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ficha */

$this->title = 'Crear ficha';
$this->params['breadcrumbs'][] = ['label' => 'Fichas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ficha-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
