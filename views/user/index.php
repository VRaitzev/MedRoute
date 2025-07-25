
<?php use yii\helpers\Html;?>

<ul>
<?php foreach ($users as $user): ?>
    <li>
        <?= Html::encode($user->username) ?> (<?= Html::encode($user->email) ?>)
        <?= Html::a('Редактировать', ['user/update', 'id' => $user->id], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Удалить', ['user/delete', 'id' => $user->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этого пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </li>
<?php endforeach; ?>
</ul>