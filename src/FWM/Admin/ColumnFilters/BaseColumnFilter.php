<?php namespace FWM\Admin\ColumnFilters;

use AdminTemplate;
use Illuminate\Contracts\Support\Renderable;
use FWM\Admin\AssetManager\AssetManager;
use FWM\Admin\Helpers\ExceptionHandler;
use FWM\Admin\Interfaces\ColumnFilterInterface;

abstract class BaseColumnFilter implements Renderable, ColumnFilterInterface
{

	protected $view;

	protected function getParams()
	{
		return [];
	}

	public function render()
	{
		$params = $this->getParams();
		return view(AdminTemplate::view('columnfilter.' . $this->view), $params);
	}

	/**
	 * @return string
	 */
	function __toString()
	{
		return (string)$this->render();
	}

} 