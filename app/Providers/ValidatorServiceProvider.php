<?php namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider {

	public function boot()
	{
		Validator::resolver(function($translator, $data, $rules, $messages)
		{
			return new \App\Core\Validator($translator, $data, $rules, $messages);
		});
	}

	public function register()
	{
		
	}
}