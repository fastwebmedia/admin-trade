<?php namespace FWM\Admin\FormItems;

use AdminTemplate;
use Illuminate\Contracts\Support\Renderable;
use FWM\Admin\Helpers\ExceptionHandler;
use FWM\Admin\Interfaces\FormItemInterface;

abstract class BaseFormItem implements Renderable, FormItemInterface
{

	protected $view;
	protected $instance;
	protected $validationRules = [];
	protected $ignored = false;

	public function initialize()
	{
	}

	public function setInstance($instance)
	{
		return $this->instance($instance);
	}

	public function instance($instance = null)
	{
		if (is_null($instance))
		{
			return $this->instance;
		}
		$this->instance = $instance;
		return $this;
	}

	public function validationRules($validationRules = null)
	{
		if (is_null($validationRules))
		{
			return $this->validationRules;
		}
		$this->validationRules = $validationRules;
		return $this;
	}

	public function getValidationRules()
	{
		return $this->validationRules();
	}

	public function validationRule($rule)
	{
		$this->validationRules[] = $rule;
		return $this;
	}

	public function save()
	{
	}

	public function getParams()
	{
		return [
			'instance' => $this->instance(),
		];
	}

	public function render()
	{
		$params = $this->getParams();
		return view(AdminTemplate::view('formitem.' . $this->view), $params)->render();
	}

	function __toString()
	{
		try
		{
			return (string)$this->render();
		} catch (\Exception $e)
		{
			ExceptionHandler::handle($e);
		}
	}

} 