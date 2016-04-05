<?php namespace FWM\Admin\Columns;

use FWM\Admin\Base\AliasBinder;

/**
 * @method static \FWM\Admin\Columns\Column\Action action($name)
 * @method static \FWM\Admin\Columns\Column\Checkbox checkbox()
 * @method static \FWM\Admin\Columns\Column\Control control()
 * @method static \FWM\Admin\Columns\Column\Count count($name)
 * @method static \FWM\Admin\Columns\Column\Custom custom()
 * @method static \FWM\Admin\Columns\Column\DateTime datetime($name)
 * @method static \FWM\Admin\Columns\Column\Filter filter($name)
 * @method static \FWM\Admin\Columns\Column\Image image($name)
 * @method static \FWM\Admin\Columns\Column\Lists lists($name)
 * @method static \FWM\Admin\Columns\Column\Order order()
 * @method static \FWM\Admin\Columns\Column\AdminString string($name)
 * @method static \FWM\Admin\Columns\Column\TreeControl treeControl()
 * @method static \FWM\Admin\Columns\Column\Url url($name)
 * @method static \FWM\Admin\Columns\Column\Boolean boolean($name)
 */
class Column extends AliasBinder
{

	/**
	 * Column class aliases
	 * @var string[]
	 */
	protected static $aliases = [];

}
