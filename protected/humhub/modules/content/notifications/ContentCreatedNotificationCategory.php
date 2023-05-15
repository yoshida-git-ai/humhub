// Kurahito Yoshida Japanese Language

<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\content\notifications;

use Yii;
use humhub\modules\notification\components\NotificationCategory;

/**
 * Description of ContentCreatedNotificationCategory
 *
 * @author buddha
 */
class ContentCreatedNotificationCategory extends NotificationCategory
{

    /**
     * @inheritdoc
     */
    public $id = "content_created";

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return Yii::t('ContentModule.notifications', 'フォローしているコンテンツの通知を受け取る');
    }

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return Yii::t('ContentModule.notifications', 'コンテンツ');
    }

}
