<?php namespace FWM\Admin\Interfaces;

interface DynamicFormItemInterface
{

	/**
	 * Initialize form item
	 */
	public function initialize();

	/**
	 * Set currently rendered instance
	 * @param mixed $instance
	 */
	public function setInstance($instance);

	/**
	 * Get form item validation rules
	 * @return mixed
	 */
	public function getValidationRules();

	/**
	 * Save form item
	 */
	public function save();

} 