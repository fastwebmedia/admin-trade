<?php namespace FWM\Admin\Templates;

use FWM\Admin\AssetManager\AssetManager;
use FWM\Admin\Interfaces\TemplateInterface;

class TemplateDefault implements TemplateInterface
{

	/**
	 *
	 */
	function __construct()
	{
        AssetManager::addStyle('admin::default/css/vendor.css');
        AssetManager::addStyle('admin::default/css/app.css');

        AssetManager::addScript(route('admin.lang'));
        AssetManager::addScript('admin::default/js/vendor.js');
        AssetManager::addScript('admin::default/js/app.js');
	}

	/**
	 * Get full view name
	 * @param string $view
	 * @return string
	 */
	public function view($view)
	{
		return 'admin::default.' . $view;
	}

}