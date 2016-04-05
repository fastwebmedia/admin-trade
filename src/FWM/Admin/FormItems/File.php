<?php namespace FWM\Admin\FormItems;

use Route;

class File extends Image
{

	protected $view = 'file';
	protected static $route = 'uploadFile';

	public static function registerRoutes()
	{
		Route::post('formitems/image/' . static::$route, ['as' => 'admin.formitems.image.' . static::$route, 'uses' => 'FWM\Admin\Http\Controllers\FileController@postUpload']);
	}
}