<?php
namespace Craft;

/**
 * Big Dates plugin class
 */
class BigDatesPlugin extends BasePlugin
{
	/**
	 * @return string
	 */
	public function getName()
	{
		return 'Big Dates';
	}

	/**
	 * @return string
	 */
	public function getVersion()
	{
		return '1.1.1';
	}

	/**
	 * @return string
	 */
	public function getSchemaVersion()
	{
		return '1.0.0';
	}

	/**
	 * @return string
	 */
	public function getDeveloper()
	{
		return 'Pixel & Tonic';
	}

	/**
	 * @return string
	 */
	public function getDeveloperUrl()
	{
		return 'http://pixelandtonic.com';
	}

	/**
	 * @return string
	 */
	public function getPluginUrl()
	{
		return 'https://github.com/pixelandtonic/BigDates';
	}

	/**
	 * @return string
	 */
	public function getDocumentationUrl()
	{
		return $this->getPluginUrl().'/blob/master/README.md';
	}

	/**
	 * @return string
	 */
	public function getReleaseFeedUrl()
	{
		return 'https://raw.githubusercontent.com/pixelandtonic/BigDates/master/releases.json';
	}

	/**
	 * @param BaseElementModel $element
	 * @param                  $attribute
	 *
	 * @return null|string
	 */
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
