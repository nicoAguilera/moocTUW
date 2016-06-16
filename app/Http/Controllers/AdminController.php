<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Facades
use Lang;
use View;

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

}
