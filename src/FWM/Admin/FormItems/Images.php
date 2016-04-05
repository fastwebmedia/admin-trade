<?php namespace FWM\Admin\FormItems;

use Input;
use FWM\Admin\AssetManager\AssetManager;

class Images extends Image
{

	protected $view = 'images';

	public function save()
	{
		$name = $this->name();
		$value = Input::get($name, '');
		if ( ! empty($value))
		{
			$value = explode(',', $value);
		} else
		{
			$value = [];
		}
		Input::merge([$name => $value]);
		parent::save();
	}

	public function value()
	{
		$value = parent::value();
		if (is_null($value))
		{
			$value = [];
		}
		if (is_string($value))
		{
			$value = preg_split('/,/', $value, -1, PREG_SPLIT_NO_EMPTY);
		}
		return $value;
	}

}