<?php namespace App\Core;

use Illuminate\Validation\Validator as LaravelValidator;

//Facades
use Config;

class Validator extends LaravelValidator{

	public function validateStartDateMin($attribute, $value, $parameters)
	{
		return $value >= \Carbon\Carbon::today()->addWeeks(1)->toDateTimeString();
	}

	public function validateStartDateMax($attribute, $value, $parameters)
	{
		return $value <= \Carbon\Carbon::today()->addMonths(6)->toDateTimeString();
	}
	
	public function validateEndDateMin($attribute, $value, $parameters)
	{
		return $value >= \Carbon\Carbon::createFromFormat(Config::get('course.date_format'), $parameters[0])->addWeeks(4)->toDateTimeString();
	}

	public function validateEndDateMax($attribute, $value, $parameters)
	{
		return $value <= \Carbon\Carbon::createFromFormat(Config::get('course.date_format'), $parameters[0])->addMonths(3)->toDateTimeString();
	}
}