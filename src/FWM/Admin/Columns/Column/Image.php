<?php namespace FWM\Admin\Columns\Column;

use AdminTemplate;
use Illuminate\View\View;
use FWM\Admin\AssetManager\AssetManager;

class Image extends NamedColumn
{

	/**
	 * Initialize column
	 */
	public function initialize()
	{
		parent::initialize();
	}

	/**
	 * @param $name
	 */
	function __construct($name)
	{
		parent::__construct($name);

		$this->orderable(false);
	}

	/**
	 * @return View
	 */
	public function render()
	{
		$value = $this->getValue($this->instance, $this->name());
		if ( ! empty($value) && (strpos($value, '://') === false))
		{
			$value = asset($value);
		}
		$params = [
			'value'  => $value,
			'append' => $this->append(),
		];
		return view(AdminTemplate::view('column.image'), $params);
	}

}