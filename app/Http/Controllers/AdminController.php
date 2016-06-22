<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Facades
use Lang;
use View;

//Models
use App\Models\Course;
use App\Models\User;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('is.admin', ['only' => 'showPanelAdmin']);
	}

	public function showPanelAdmin()
	{
		$title = Lang::get('admin.panel_admin_browser_title');

		return View::make('admin.panel_admin', ['title' => $title]);
	}

	public function coursesIndex()
	{
		$title = Lang::get('courses.index_browser_title');

		$courses = Course::all();
		return View::make('admin.courses_index', ['title' => $title, 'courses' => $courses]);
	}

	public function coursesCreate()
	{
		$title = Lang::get('courses.create_browser_title');

		return View::make('admin.courses_create', compact('title'));
	}

	public function coursesShow($courseId)
	{
		$course = Course::findOrFail($courseId);
		
		$teachers = $course->teachers;

		$title = $course->name;

		return view('admin.courses_show', [
							'title' 	=> $title,
							'course' 	=> $course,
							'teachers'	=> $teachers 
						]);
	}

	public function addTeachersCourse($courseId)
	{
		$title = Lang::get('teachers.index_browser_title');

		$course = Course::findOrFail($courseId);
		$teachers = User::where('role', '=', 'teacher')->paginate(5);

		return View::make('admin.add_teachers_course', [
			'title'		=>	$title,
			'course'	=>	$course,
			'teachers'	=> 	$teachers
		]);
	}

	public function teachersCreateAndAddCourse($courseId)
	{
		$course = Course::findOrFail($courseId);

		$title = Lang::get('teachers.create_browser_title');

		return View::make('admin.courses_teachers_create', ['title' => $title, 'course' => $course]);
	}

	public function teachersIndex()
	{
		$title = Lang::get('teachers.index_browser_title');

		$teachers = User::where('role', '=', 'teacher')->paginate(5);

		return View::make('admin.teachers_index', [
			'title'		=>	$title,
			'teachers'	=> 	$teachers
		]);
	}

	public function teachersCreate()
	{
		$title = Lang::get('teachers.create_browser_title');

		return View::make('admin.teachers_create', compact('title'));
	}

	public function teachersShow($teacherId)
	{
		$teacher = User::findOrFail($teacherId);

		$title = $teacher->name;

		return View::make('admin.teachers_show', [
							'title'		=> $title,
							'teacher'	=> $teacher
						]);
	}
}
