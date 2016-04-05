<?php namespace FWM\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use FWM\Admin\ColumnFilters\ColumnFilter;

class ColumnFilterServiceProvider extends ServiceProvider
{

	public function register()
	{
		ColumnFilter::register('text', 'FWM\Admin\ColumnFilters\Text');
		ColumnFilter::register('date', 'FWM\Admin\ColumnFilters\Date');
		ColumnFilter::register('range', 'FWM\Admin\ColumnFilters\Range');
		ColumnFilter::register('select', 'FWM\Admin\ColumnFilters\Select');
	}

}