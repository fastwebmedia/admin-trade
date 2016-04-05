<?php namespace FWM\Admin\FormItems;

use Illuminate\Database\Eloquent\Collection;

class MultiSelect extends Select
{

	protected $view = 'multiselect';

	public function value()
	{
		$value = parent::value();
		if ($value instanceof Collection)
		{
			$value = $value->lists('id');
		}
		if ($value instanceof Collection)
		{
			$value = $value->toArray();
		}
		return $value;
	}

}