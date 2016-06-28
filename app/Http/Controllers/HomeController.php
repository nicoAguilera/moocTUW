<?php namespace App\Http\Controllers;

//Facades
use Lang;

//Models
use App\Models\Course;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = Lang::get('auth.home_browser_title');

		$courses = Course::where('active', '=', 1)->get();

		return view('home', ['title' => $title, 'courses' => $courses] );
	}

}
