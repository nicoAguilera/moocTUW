<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

//Facades
use Config;
use Lang;

class CourseAndModuleRequest extends Request {

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
		$rules	= [
			'name'			=>	[
				'required'
			],
			'start_date'	=>	[
				'required',
				'date',
				'date_format:' .Config::get('course.date_format'),
			],
			'end_date'		=>	[
				'required',
				'date',
				'date_format:' .Config::get('course.date_format'),
			]
		];

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
			'name'			=> 	Lang::get('course.create_name_label'),
			'start_date'	=>	Lang::get('course.start_date_label'),
			'end_date'		=>	Lang::get('course.end_date_label')
		];
	}

}
