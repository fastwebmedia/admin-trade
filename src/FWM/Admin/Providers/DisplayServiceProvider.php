<?php namespace FWM\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use FWM\Admin\Display\AdminDisplay;

class DisplayServiceProvider extends ServiceProvider
{

	public function register()
	{
		AdminDisplay::register('datatables', 'FWM\Admin\Display\DisplayDatatables');
		AdminDisplay::register('datatablesAsync', 'FWM\Admin\Display\DisplayDatatablesAsync');
		AdminDisplay::register('tab', 'FWM\Admin\Display\DisplayTab');
		AdminDisplay::register('tabbed', 'FWM\Admin\Display\DisplayTabbed');
		AdminDisplay::register('table', 'FWM\Admin\Display\DisplayTable');
		AdminDisplay::register('tree', 'FWM\Admin\Display\DisplayTree');
	}

}