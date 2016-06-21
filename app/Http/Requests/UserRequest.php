<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

//Facades
use Config;
use Lang;
use Route;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$currentRoute = Route::currentRouteName();

		if($currentRoute === 'signup' || $currentRoute === 'teachers.store')
		{
			$rules = [
				'name' 	=>	[
					'required',
					'regex:'. Config::get('user.name_regex'),
					'between:1,'. Config::get('user.name_max_length'),
				],
				'email'	=>	[
					'required',
					'unique:users,email',
					'email',
					'min:'. Config::get('user.email_min_length'),
					'max:'. Config::get('user.email_max_length'),
				],
				'password'	=>	[
					'required',
					'confirmed',
					'min:'. Config::get('user.password_min_length'),
					'max:'. Config::get('user.password_max_length'),
				],
			];
		}
		elseif($currentRoute === 'login')
		{
			$rules = [
				'email'	=>	[
					'required',
					'exists:users,email',
					'email',
				],
				'password'	=>	[
					'required',
				],
				'remember_me' => [
					'in:true',
				],
			];
		}
		return $rules;
	}

	/**
	 * Translate the names of the attributes
	 *
	 * @return array
	 */
	public function attributes()
	{
		return [
			'name'					=> Lang::get('auth.name_label'),
			'email'					=> Lang::get('auth.email_label'),
			'password'				=> Lang::get('auth.password_label'),
			'password_confirmation'	=> Lang::get('auth.password_confirmation_label'),
		];
	}

	/**
	 * Set the custom messages
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'name.regex'	=> Lang::get('auth.name_regex_error'),
			'email.exists'	=> Lang::get('auth.email_exists_error'),
		];
	}

}
