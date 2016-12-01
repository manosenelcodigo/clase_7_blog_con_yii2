<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'username',
            'photo',
            //'auth_key',
            //'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'  => [
                    'update' => function($url, $model, $key) {
                        return Html::a(
                            "<span class='glyphicon glyphicon-pencil'></span>",
                            $url,
                            [
                                "title" => "Editar registro",
                            ]
                        );
                    }
                ],
                'template' => '{update} {delete} {habilitar}',
                'urlCreator'   => function($action, $model, $key, $index){
                   if ( $action === "update" ) {
                       return Url::to(["user/update", "id" => $key]);
                   } elseif ( $action == "delete" ) {
                       return Url::to(["user/delete", "id" => $key]);
                   }
                }
            ],
        ],
    ]); ?>
</div>
