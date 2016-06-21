<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	protected $guarded = ['id'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'start_date', 'end_date'];

	/**
	* The attributes that be mutated to dates
	*
	* @var string
	*/
	protected $dates = ['start_at', 'end_date'];


	/**
	 * Relationship one to many
	 */
	public function modules()
	{
		return $this->hasMany('App\Models\Module');
	}

	/*
	 *	Inverse of relations teachers_dictate_courses
	 */
	public function teachers()
	{
		return $this->belongsToMany('App\Models\User', 'teachers_dictate');
	}
}
