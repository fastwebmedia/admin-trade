<?php 

abstract class TestBase extends Orchestra\Testbench\TestCase
{

	protected function getPackageProviders($app)
	{
		return ['FWM\Admin\AdminServiceProvider'];
	}

	protected function getPackageAliases($app)
	{
		return [
			'Admin'         => 'FWM\Admin\Admin',
			'AdminAuth'     => 'FWM\AdminAuth\Facades\AdminAuth',
			'Column'        => 'FWM\Admin\Columns\Column',
			'Filter'        => 'FWM\Admin\Filter\Filter',
			'AdminDisplay'  => 'FWM\Admin\Display\AdminDisplay',
			'AdminForm'     => 'FWM\Admin\Form\AdminForm',
			'AdminTemplate' => 'FWM\Admin\Templates\Facade\AdminTemplate',
			'FormItem'      => 'FWM\Admin\FormItems\FormItem',
		];
	}

	public function setUp()
	{
		parent::setUp();

		$this->artisan('migrate', [
			'--database' => 'testbench',
			'--realpath' => realpath(__DIR__.'/../src/migrations'),
		]);
		$this->artisan('migrate', [
			'--database' => 'testbench',
			'--realpath' => realpath(__DIR__.'/migrations'),
		]);
		$administrator = \FWM\AdminAuth\Entities\Administrator::create([
			'username' => 'admin',
			'password' => 'admin',
			'name' => 'admin',
		]);
		AdminAuth::login($administrator);
	}

	protected function getEnvironmentSetUp($app)
	{
		$app['config']->set('database.default', 'testbench');
		$app['config']->set('database.connections.testbench', [
			'driver'   => 'sqlite',
			'database' => ':memory:',
			'prefix'   => '',
		]);
	}

} 