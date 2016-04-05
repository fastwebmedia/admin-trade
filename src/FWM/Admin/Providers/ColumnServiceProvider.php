<?php namespace FWM\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use FWM\Admin\Columns\Column;

class ColumnServiceProvider extends ServiceProvider
{

	public function register()
	{
		Column::register('action', 'FWM\Admin\Columns\Column\Action');
		Column::register('checkbox', 'FWM\Admin\Columns\Column\Checkbox');
		Column::register('control', 'FWM\Admin\Columns\Column\Control');
		Column::register('count', 'FWM\Admin\Columns\Column\Count');
		Column::register('custom', 'FWM\Admin\Columns\Column\Custom');
		Column::register('datetime', 'FWM\Admin\Columns\Column\DateTime');
		Column::register('filter', 'FWM\Admin\Columns\Column\Filter');
		Column::register('image', 'FWM\Admin\Columns\Column\Image');
		Column::register('lists', 'FWM\Admin\Columns\Column\Lists');
		Column::register('order', 'FWM\Admin\Columns\Column\Order');
		Column::register('string', 'FWM\Admin\Columns\Column\AdminString');
		Column::register('treeControl', 'FWM\Admin\Columns\Column\TreeControl');
		Column::register('url', 'FWM\Admin\Columns\Column\Url');
		Column::register('boolean', 'FWM\Admin\Columns\Column\Boolean');
	}

}
