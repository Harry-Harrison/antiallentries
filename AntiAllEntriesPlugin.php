<?php
/**
 * Anti-All Entries plugin for Craft CMS
 *
 * Removes the All Entries item from Craft's Entries view.
 *
 *
 * @author    Harry Harrison
 * @copyright Copyright (c) 2016 Harry Harrison
 * @link      http://harryharrison.co/
 * @package   AntiallEntries
 * @since     1.0.0
 */

namespace Craft;

class AntiAllEntriesPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('Anti-All Entries');
    }

	public function getDescription()
	{
		return Craft::t('Removes the All Entries item from Craft\'s Entries view.');
	}

    public function getDocumentationUrl()
    {
        return 'https://github.com/harry-harrison/antiallentries/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/harry-harrison/antiallentries/master/releases.json';
    }

    public function getVersion()
    {
        return '1.0.1';
    }

    public function getSchemaVersion()
    {
        return '1.0.1';
    }

    public function getDeveloper()
    {
        return 'Harry Harrison';
    }

    public function getDeveloperUrl()
    {
        return 'http://harryharrison.co';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function modifyEntrySources(&$sources, $context)
    {
        if ($context == 'index')
        {
            unset($sources['*']);
        }
    }
}
