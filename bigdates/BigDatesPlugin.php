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
	    return '1.1';
	}

	public function getDeveloper()
	{
	    return 'Pixel & Tonic';
	}

	public function getDeveloperUrl()
	{
	    return 'http://pixelandtonic.com';
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
