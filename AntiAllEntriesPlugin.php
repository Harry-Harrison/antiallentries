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
		return Craft::t('Removes the All Entries source from Craft\'s Entries view and renames Singles source to Pages.');
	}

    public function getDocumentationUrl()
    {
        return 'https://github.com/harry-harrison/antiallentries/';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/harry-harrison/antiallentries/master/releases.json';
    }

    public function getVersion()
    {
        return '1.1.1';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
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

    public function getSettingsHtml()
    {
        return craft()->templates->render('antiallentries/settings', array(
            'settings' => $this->getSettings()
        ));
    }

    protected function defineSettings()
    {
        return array(
            'singlesLabel' => array(AttributeType::String, 'default' => 'Singles', 'required' => true),
            'showAllEntries' => array(AttributeType::Bool, 'default' => 0),
        );
    }

    public function modifyEntrySources(&$sources, $context)
    {
        $settings = $this->getSettings();

        if ($context == 'index')
        {
            // Remove All Entries
            if ($settings->showAllEntries == 0) {
                unset($sources['*']);
            }
            // Rename Singles to singlesLabel
            $sources['singles']['label'] = $settings->singlesLabel;
        }
    }
}
