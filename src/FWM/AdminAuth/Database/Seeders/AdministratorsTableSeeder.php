<?php namespace FWM\AdminAuth\Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use FWM\AdminAuth\Entities\Administrator;

class AdministratorsTableSeeder extends Seeder
{

	public function run()
	{
		Administrator::truncate();

		$default = [
			'username' => 'admin',
			'password' => 'password',
			'name'     => 'Admin'
		];

		try
		{
			Administrator::create($default);
		} catch (\Exception $e)
		{
		}
	}

}
