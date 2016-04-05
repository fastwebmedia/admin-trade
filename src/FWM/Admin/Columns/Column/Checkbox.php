<?php namespace FWM\Admin\Columns\Column;

use AdminTemplate;
use Illuminate\View\View;
use FWM\Admin\AssetManager\AssetManager;

class Checkbox extends BaseColumn
{

	/**
	 *
	 */
	function __construct()
	{
		parent::__construct();

		$this->label('<input type="checkbox" class="adminCheckboxAll"/>');
		$this->orderable(false);
	}

	/**
	 * Initialize column
	 */
	public function initialize()
	{
		parent::initialize();
	}

	/**
	 * @return View
	 */
	public function render()
	{
		$params = [
			'value' => $this->instance->getKey(),
		];
		return view(AdminTemplate::view('column.checkbox'), $params);
	}

}