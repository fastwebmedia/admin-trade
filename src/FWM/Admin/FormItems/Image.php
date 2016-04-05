<?php namespace FWM\Admin\FormItems;

use Input;
use Route;
use Request;
use Response;
use Validator;
use FWM\Admin\Interfaces\WithRoutesInterface;

class Image extends NamedFormItem implements WithRoutesInterface
{
	protected $view = 'image';
	protected static $route = 'uploadImage';

	public function initialize()
	{
		parent::initialize();
	}

	public static function registerRoutes()
	{
		Route::post('formitems/image/' . static::$route, ['as' => 'admin.formitems.image.' . static::$route, 'uses' => 'FWM\Admin\Http\Controllers\ImageController@postUpload']);
	}

}