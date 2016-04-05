<?php namespace FWM\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use FWM\Admin\FormItems\FormItem;

class FormItemServiceProvider extends ServiceProvider
{

	public function register()
	{
		FormItem::register('columns', 'FWM\Admin\FormItems\Columns');
		FormItem::register('text', 'FWM\Admin\FormItems\Text');
		FormItem::register('time', 'FWM\Admin\FormItems\Time');
		FormItem::register('date', 'FWM\Admin\FormItems\Date');
		FormItem::register('timestamp', 'FWM\Admin\FormItems\Timestamp');
		FormItem::register('textaddon', 'FWM\Admin\FormItems\TextAddon');
		FormItem::register('select', 'FWM\Admin\FormItems\Select');
		FormItem::register('multiselect', 'FWM\Admin\FormItems\MultiSelect');
		FormItem::register('hidden', 'FWM\Admin\FormItems\Hidden');
		FormItem::register('checkbox', 'FWM\Admin\FormItems\Checkbox');
		FormItem::register('ckeditor', 'FWM\Admin\FormItems\CKEditor');
		FormItem::register('custom', 'FWM\Admin\FormItems\Custom');
		FormItem::register('password', 'FWM\Admin\FormItems\Password');
		FormItem::register('textarea', 'FWM\Admin\FormItems\Textarea');
		FormItem::register('view', 'FWM\Admin\FormItems\View');
		FormItem::register('image', 'FWM\Admin\FormItems\Image');
		FormItem::register('images', 'FWM\Admin\FormItems\Images');
		FormItem::register('file', 'FWM\Admin\FormItems\File');
		FormItem::register('radio', 'FWM\Admin\FormItems\Radio');
		FormItem::register('slug', 'FWM\Admin\FormItems\Slug');
		FormItem::register('selectaction', 'FWM\Admin\FormItems\SelectAction');
	}

}