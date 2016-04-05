<?php namespace FWM\Admin\FormItems;

use FWM\Admin\Base\AliasBinder;

/**
 * Class AdminForm
 * @package FWM\Admin\Form
 * @method static \FWM\Admin\FormItems\Text text($name, $label = null)
 * @method static \FWM\Admin\FormItems\Image image($name, $label = null)
 * @method static \FWM\Admin\FormItems\Images images($name, $label = null)
 * @method static \FWM\Admin\FormItems\File file($name, $label = null)
 * @method static \FWM\Admin\FormItems\Time time($name, $label = null)
 * @method static \FWM\Admin\FormItems\Date date($name, $label = null)
 * @method static \FWM\Admin\FormItems\Timestamp timestamp($name, $label = null)
 * @method static \FWM\Admin\FormItems\TextAddon textaddon($name, $label = null)
 * @method static \FWM\Admin\FormItems\Password password($name, $label = null)
 * @method static \FWM\Admin\FormItems\Select select($name, $label = null)
 * @method static \FWM\Admin\FormItems\MultiSelect multiselect($name, $label = null)
 * @method static \FWM\Admin\FormItems\Columns columns()
 * @method static \FWM\Admin\FormItems\Hidden hidden($name)
 * @method static \FWM\Admin\FormItems\Custom custom()
 * @method static \FWM\Admin\FormItems\View view($view)
 * @method static \FWM\Admin\FormItems\Checkbox checkbox($name, $label = null)
 * @method static \FWM\Admin\FormItems\CKEditor ckeditor($name, $label = null)
 * @method static \FWM\Admin\FormItems\Textarea textarea($name, $label = null)
 * @method static \FWM\Admin\FormItems\Radio radio($name, $label = null)
 * @method static \FWM\Admin\FormItems\Slug slug($name, $label = null)
 * @method static \FWM\Admin\FormItems\SelectAction selectaction($name, $label = null)
 */
class FormItem extends AliasBinder
{
	protected static $aliases = [];
}