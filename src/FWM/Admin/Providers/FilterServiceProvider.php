<?php namespace FWM\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use FWM\Admin\Filter\Filter;

class FilterServiceProvider extends ServiceProvider
{

	public function register()
	{
		Filter::register('field', 'FWM\Admin\Filter\FilterField');
		Filter::register('scope', 'FWM\Admin\Filter\FilterScope');
		Filter::register('custom', 'FWM\Admin\Filter\FilterCustom');
		Filter::register('related', 'FWM\Admin\Filter\FilterRelated');
	}

}