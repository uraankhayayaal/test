<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <h1>Зарплаты ранее</h1>
        <div class="row">
        <?php foreach ($model as $key => $manager) { ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h3><?= $manager->name ?></h3>
                <?php foreach (\frontend\models\ManagerBonus::find()->where(['manager_id' => $manager->id])->orderBy(['created_at' => SORT_DESC])->all() as $key => $month) { ?>
                    <p><?= date("m-Y", $month->created_at); ?>: <?= $month->salary ?> <?= $month->bonus ? ("<b>(".$month->bonus->size.")</b>") : ''; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        </div>

    </div>
</div>
