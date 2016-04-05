<?php namespace FWM\Admin\ColumnFilters;

use FWM\Admin\Base\AliasBinder;

/**
 * @method static \FWM\Admin\ColumnFilters\Text text()
 * @method static \FWM\Admin\ColumnFilters\Date date()
 * @method static \FWM\Admin\ColumnFilters\Select select()
 * @method static \FWM\Admin\ColumnFilters\Range range()
 */
class ColumnFilter extends AliasBinder
{

	/**
	 * Column filter class aliases
	 * @var string[]
	 */
	protected static $aliases = [];

}