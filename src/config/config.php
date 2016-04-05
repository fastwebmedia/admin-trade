<?php

return [
	/*
	 * Admin title
	 * Displays in page title and header
	 */
	'title'                   => 'Administrator',

	/*
	 * Admin url prefix
	 */
	'prefix'                  => 'admin',

	/*
	 * Middleware to use in admin routes
	 */
	'middleware'              => ['admin.auth'],

	/*
	 * Path to admin bootstrap files directory
	 * Default: app_path('Admin')
	 */
	'bootstrapDirectory'      => app_path('Admin'),

	/*
	 * Directory to upload images to (relative to public directory)
	 */
	'imagesUploadDirectory' => 'images/uploads',

	/*
	 * AWS Paths
	 */
	'aws' => [
		'uploadPath' => getenv('AWS_CLOUDFRONT_UPLOAD_PATH')
	],

	/*
	 * Authentication config
	 */
	'auth'                    => [
		'model' => '\FWM\AdminAuth\Entities\Administrator',
		'rules' => [
			'username' => 'required',
			'password' => 'required',
		]
	],

	/*
	 * Template to use
	 */
	'template'                => 'FWM\Admin\Templates\TemplateDefault',

	/*
	 * Default date and time formats
	 */
	'datetimeFormat'          => 'd/m/Y H:i',
	'dateFormat'              => 'd/m/Y',
	'timeFormat'              => 'H:i',
];
