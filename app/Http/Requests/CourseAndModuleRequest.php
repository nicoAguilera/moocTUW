<?php namespace App\Http\Requests;

use App\Http\Requests\Request as FormRequest;


//Facades
use Config;
use Lang;
use Request;

class CourseAndModuleRequest extends FormRequest {

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
			'description'	=>	[
				'required'
			],
			'start_date'	=>	[
				'required',
				'date',
				'date_format:' .Config::get('course.date_format'),
				'start_date_min',
				'start_date_max',
			],
			'end_date'		=>	[
				'required',
				'date',
				'date_format:' .Config::get('course.date_format'),
				'end_date_min:' .Request::input('start_date'),
				'end_date_max:' .Request::input('start_date'),
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
			'name'			=> 	Lang::get('courses.name_label'),
			'description'	=>	Lang::get('courses.description_label'),
			'start_date'	=>	Lang::get('courses.start_date_label'),
			'end_date'		=>	Lang::get('courses.end_date_label'),
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
			'start_date.start_date_min'	=>	Lang::get('courses.start_date_min_error'),
			'start_date.start_date_max'	=>	Lang::get('courses.start_date_max_error'),
			'end_date.end_date_min'		=>  Lang::get('courses.end_date_min_error'),
			'end_date.end_date_max'		=>  Lang::get('courses.end_date_max_error'),
		];
	}
}
