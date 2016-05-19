<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

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
		return [
			'name' 		=>	'required|regex:/^[(a-zA-Z\s)]+$/u|between:1,255',
			'surname'	=>	'required|regex:/^[(a-zA-Z\s)]+$/u|between:1,255',
			'email'		=>	'required|unique:users,email|email|max:255',
			'password'	=>	'required|between:6,60'
		];
	}

}
