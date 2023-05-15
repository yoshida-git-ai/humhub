// Kurahito Yoshida Japanese Language

<?php
humhub\modules\user\widgets\AccountMenu::markAsActive(['/user/account/edit-settings']);
?>

<div class="panel-heading">
    <?= Yii::t('UserModule.account', '<strong>Account</strong> Settings') ?> <?php echo \humhub\widgets\DataSaved::widget(); ?>
</div>
<div class="panel-body">
    <?= Yii::t('UserModule.account', 'プロファイルの基本設定を定義します。 自分に合ったタグを追加し、言語とタイムゾーンを選択して、失礼なユーザーをブロックできます。') ?>
</div>

<?= humhub\modules\user\widgets\AccountSettingsMenu::widget(); ?>

<div class="panel-body">
    <?= $content; ?>
</div>





