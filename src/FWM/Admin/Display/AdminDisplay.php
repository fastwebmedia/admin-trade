<?php namespace FWM\Admin\Display;

use FWM\Admin\Base\AliasBinder;

/**
 * @method static \FWM\Admin\Display\DisplayDatatables datatables()
 * @method static \FWM\Admin\Display\DisplayDatatablesAsync datatablesAsync()
 * @method static \FWM\Admin\Display\DisplayTab tab($display)
 * @method static \FWM\Admin\Display\DisplayTabbed tabbed()
 * @method static \FWM\Admin\Display\DisplayTable table()
 * @method static \FWM\Admin\Display\DisplayTree tree()
 */
class AdminDisplay extends AliasBinder
{

	/**
	 * Display class aliases
	 * @var string[]
	 */
	protected static $aliases = [];

}