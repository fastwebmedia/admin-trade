<?php namespace FWM\Admin\Interfaces;

interface ColumnFilterInterface
{

	/**
	 * Initialize column filter
	 */
	public function initialize();

	public function apply($repository, $column, $query, $search, $fullSearch, $operator = '=');

} 