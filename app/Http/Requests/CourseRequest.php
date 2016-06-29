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
				'start_date_min',
				'start_date_max',
			],
			'end_date'		=>	[
				'required',
				'date',
				'end_date_min:' .Request::input('start_date'),
				'end_date_max:' .Request::input('start_date'),
			]
		];

		return $rules;
	}

	/**
	 * Set the custom messages
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'start_date.start_date_min'	=>	trans('courses.start_date_min_error'),
			'start_date.start_date_max'	=>	Lang::get('courses.start_date_max_error'),
			'end_date.end_date_min'		=>  Lang::get('courses.end_date_min_error'),
			'end_date.end_date_max'		=>  Lang::get('courses.end_date_max_error'),
		];
	}
}
