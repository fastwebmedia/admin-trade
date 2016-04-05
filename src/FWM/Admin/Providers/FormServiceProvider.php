<?php namespace FWM\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use FWM\Admin\Form\AdminForm;

class FormServiceProvider extends ServiceProvider
{

	public function register()
	{
		AdminForm::register('form', 'FWM\Admin\Form\FormDefault');
		AdminForm::register('tabbed', 'FWM\Admin\Form\FormTabbed');
        AdminForm::register('panel', 'FWM\Admin\Form\FormPanel');
	}

}