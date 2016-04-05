<?php namespace FWM\Admin\Filter;

use FWM\Admin\Base\AliasBinder;

/**
 * Class Filter
 * @package FWM\Admin\Filter
 * @method static \FWM\Admin\Filter\FilterCustom custom($name)
 * @method static \FWM\Admin\Filter\FilterField field($name)
 * @method static \FWM\Admin\Filter\FilterRelated related($name)
 * @method static \FWM\Admin\Filter\FilterScope scope($name)
 */
class Filter extends AliasBinder
{
	protected static $aliases = [];
}