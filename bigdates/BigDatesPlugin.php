<?php
namespace Craft;

/**
 * Big Dates plugin class
 */
class BigDatesPlugin extends BasePlugin
{
	public function getName()
	{
	    return 'Big Dates';
	}

	public function getVersion()
	{
	    return '1.1.0';
	}

	public function getSchemaVersion()
	{
		return '1.0.0';
	}

	public function getDeveloper()
	{
	    return 'Pixel & Tonic';
	}

	public function getDeveloperUrl()
	{
	    return 'http://pixelandtonic.com';
	}

	public function getReleaseFeedUrl()
	{
		return 'https://raw.githubusercontent.com/pixelandtonic/BigDates/master/releases.json';
	}

	public function getEntryTableAttributeHtml(BaseElementModel $element, $attribute)
	{
		if (isset($element->$attribute))
		{
			$value = $element->$attribute;

			if ($value instanceof DateTime)
			{
				return $value->localeDate().' '.$value->localeTime();
			}
		}

		return null;
	}
}
