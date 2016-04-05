<?php namespace FWM\Admin\Columns\Column;

use AdminTemplate;
use Illuminate\View\View;

class Boolean extends NamedColumn
{

	/**
	 * @return View
	 */
	public function render()
	{
		$params = [
			'value'  => $this->getValue($this->instance, $this->name()),
		];
		return view(AdminTemplate::view('column.boolean'), $params);
	}

}