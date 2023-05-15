<?php

use humhub\modules\content\components\ContentContainerModule;
use humhub\modules\content\widgets\ModuleCard;
use humhub\modules\user\models\User;

/* Kurahito Yoshida Japanese Language*/
/* @var User $user */
/* @var ContentContainerModule[] $modules */
?>
<div class="container container-cards container-modules container-content-modules container-content-modules-col-3">
    <h4><?= Yii::t('UserModule.manage', '<strong>Profile</strong> modules'); ?></h4>
    <div class="help-block"><?= Yii::t('UserModule.manage', 'スペースと同様に、個人プロファイルでもモジュールを使用できます。 プロフィールで共有する情報はネットワークの他のユーザーも利用できることに注意してください。') ?></div>

    <div class="row cards">
        <?php if (empty($modules)) : ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?= Yii::t('UserModule.manage', 'Currently there are no modules available for you!'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php foreach ($modules as $module) : ?>
            <?= ModuleCard::widget([
                'contentContainer' => $user,
                'module' => $module,
            ]); ?>
        <?php endforeach; ?>
    </div>
</div>
