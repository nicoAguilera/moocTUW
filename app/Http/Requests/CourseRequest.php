<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

//Facades
use Lang;

class CourseRequest extends Request {

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
			'name'	=> 'required'
		];
	}

	/**
	 * Translate the names of the attributes
	 *
	 * @return array
	 */
	public function attributes()
	{
		return [
			'name'	=> Lang::get('course.create_name_label'),
		];
	}

}
