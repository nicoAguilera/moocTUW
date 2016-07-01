<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

//Facades
use Lang;
use Redirect;
use View;

//Models
use App\Models\Activity;
use App\Models\Course;
use App\Models\Module;
use App\Models\Option;
use App\Models\Question;
use App\Models\Test;
use App\Models\User;

class TeacherController extends Controller {

	public function __construct()
	{
		$this->middleware('is.admin', ['only' => ['index', 'create', 'store'] ]);

		$this->middleware('is.teacher', ['only' => ['show', 'indexCourses', 'showCourses'] ]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($courseId)
	{
		$title = Lang::get('teachers.index_browser_title');

		$course = Course::findOrFail($courseId);
		$teachers = User::where('role', '=', 'teacher')->paginate(5);

		return View::make('teachers.index', [
			'title'		=>	$title,
			'course'	=>	$course,
			'teachers'	=> 	$teachers
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($courseId)
	{
		$course = Course::findOrFail($courseId);

		$title = Lang::get('teachers.create_browser_title');

		return View::make('teachers.create', ['title' => $title, 'course' => $course]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		$teacher = User::create([
						'name'		=> $request['name'],
						'email'		=> $request['email'],
						'password'	=> $request['password'],
						'role'		=> 'teacher',
					]);

		if(isset($request['courseId']))
		{
			return Redirect::route('admin.courses.teachers.show', [$request['courseId'], $teacher->id])
							->with('alert.success', Lang::get('teachers.create_success_alert'));
		}
		else
		{
			//debería ser opcional el parametro de course id y vericarlo en el metodo index
			return Redirect::route('admin.teachers.show', $teacher->id)
							->with('alert.success', Lang::get('teachers.create_success_alert'));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $teacherId
	 * @return Response
	 */
	public function show($teacherId)
	{
		$teacher = User::findOrFail($teacherId);

		$title = $teacher->name;

		return View::make('teachers.show', [
							'title'		=> $title,
							'teacher'	=> $teacher
						]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function indexCourses($teacherId)
	{
		$teacher = User::findOrFail($teacherId);

		$courses = $teacher->courses;

		$title = trans('teachers.courses_index_browser_title');

		return View::make('teachers.courses_index', [
									'title'		=> $title,
									'teacher' 	=> $teacher,
									'courses' 	=> $courses
								]);
	}

	public function showCourses($teacherId, $courseId)
	{
		$teacher = User::findOrFail($teacherId);

		$course = Course::findOrFail($courseId);

		$title = $course->name;

		return view('teachers.courses_show', [
						'title' 	=> 	$title,
						'teacher'	=>	$teacher,
						'course' 	=> 	$course
					]);
	}

	public function showModules($teacherId, $courseId, $moduleId)
	{
		$teacher = User::findOrFail($teacherId);

		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$title = $module->name;

		//dd($module->test === null);

		return view('teachers.courses_modules_show', [
							'title'		=>	$title,
							'teacher'	=>	$teacher,
							'course'	=>	$course,
							'module'	=>	$module
						]);
	}

	public function showActivities($teacherId, $courseId, $moduleId, $activityId)
	{
		$teacher = User::findOrFail($teacherId);

		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$activity = Activity::findOrFail($activityId);

		$title = $activity->title;

		return view('teachers.courses_modules_activities_show', [
							'title'		=>	$title,
							'teacher'	=>	$teacher,
							'course'	=>	$course,
							'module'	=>	$module,
							'activity'	=>	$activity
						]);
	}

	public function createTests($teacherId, $courseId, $moduleId)
	{
		$teacher = User::findOrFail($teacherId);

		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$title = 'Agregar evaluación';

		return view('teachers.tests_create', [
					'title'		=>	$title,
					'teacher'	=>	$teacher,
					'course'	=>	$course,
					'module'	=>	$module,
				]);
	}

	public function storeTests(Request $request, $teacherId, $courseId, $moduleId)
	{
		$test = Test::create($request->only('title', 'module_id'));

		return Redirect::route('tests.show', [$teacherId, $courseId, $moduleId, $test->id])
							->with('alert.success', 'La evaluación fue creada correctamente');
	}

	public function showTests($teacherId, $courseId, $moduleId, $testId)
	{
		$teacher = User::findOrFail($teacherId);

		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$test = Test::findOrFail($testId);

		$title = $test->title;

		return view('teachers.tests_show', [
					'title'		=>	$title,
					'teacher'	=>	$teacher,
					'course'	=>	$course,
					'module'	=>	$module,
					'test'		=>	$test
				]);
	}

	public function createQuestions($teacherId, $courseId, $moduleId, $testId)
	{
		$teacher = User::findOrFail($teacherId);

		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$test = Test::findOrFail($testId);

		$title = 'Agregar pregunta';

		return view('teachers.questions_create', [
					'title'		=>	$title,
					'teacher'	=>	$teacher,
					'course'	=>	$course,
					'module'	=>	$module,
					'test'		=>	$test
				]);
	}

	public function storeQuestions(Request $request, $teacherId, $courseId, $moduleId, $testId)
	{
		$question = Question::create($request->only('statement', 'test_id'));

		return Redirect::route('questions.show', [$teacherId, $courseId, $moduleId, $testId, $question->id])
							->with('alert.success', 'La pregunta fue creada correctamente');
	}

	public function showQuestions($teacherId, $courseId, $moduleId, $testId, $questionId)
	{
		$teacher = User::findOrFail($teacherId);

		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$test = Test::findOrFail($testId);

		$question = Question::findOrFail($questionId);

		$title = $question->statement;

		return view('teachers.questions_show', [
					'title'		=>	$title,
					'teacher'	=>	$teacher,
					'course'	=>	$course,
					'module'	=>	$module,
					'test'		=>	$test,
					'question'	=>	$question
				]);
	}

	public function createOptions($teacherId, $courseId, $moduleId, $testId, $questionId)
	{
		$teacher = User::findOrFail($teacherId);

		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$test = Test::findOrFail($testId);

		$question = Question::findOrFail($questionId);

		$title = 'Agregar opción';

		return view('teachers.options_create', [
					'title'		=>	$title,
					'teacher'	=>	$teacher,
					'course'	=>	$course,
					'module'	=>	$module,
					'test'		=>	$test,
					'question'	=>	$question
				]);
	}

	public function storeOptions(Request $request, $teacherId, $courseId, $moduleId, $testId, $questionId)
	{
		$option = Option::create($request->only('answer', 'question_id'));

		return Redirect::route('questions.show', [$teacherId, $courseId, $moduleId, $testId, $questionId])
							->with('alert.success', 'La respuesta fue creada correctamente');
	}
}
