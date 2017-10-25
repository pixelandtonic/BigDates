<?php

namespace craft\bigdates;

use Craft;
use craft\base\Element;
use craft\helpers\DateTimeHelper;
use craft\elements\Entry;
use craft\events\SetElementTableAttributeHtmlEvent;
use craft\i18n\Locale;
use yii\base\Event;
use DateTime;

/**
 * Big Dates plugin class
 */
class Plugin extends \craft\base\plugin
{
    /**
     * @return void
     */
    public function init(): void
    {
        parent::init();
        Event::on(Entry::class, Element::EVENT_SET_TABLE_ATTRIBUTE_HTML, function (SetElementTableAttributeHtmlEvent $event) {
            if ($event->attribute !== null) {
                $attribute = $event->attribute;
                $value = $event->sender->$attribute;

                $date = DateTimeHelper::toDateTime($value);

                if ($date instanceof DateTime) {
                    $formattedDateTime = Craft::$app->getLocale()->getFormatter()->asDatetime($date, Locale::LENGTH_SHORT);
                    $event->html = $formattedDateTime;
                    $event->handled = true;
                }
            }
            $event->handled = false;
        });
    }
}
