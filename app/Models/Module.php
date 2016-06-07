<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model 
{

	protected $guarded = ['id'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'start_date', 'end_date', 'course_id'];

	/**
	* The attributes that be mutated to dates
	*
	* @var string
	*/
	protected $dates = ['start_at', 'end_date'];


	/**
	 * Inverse of the relationship one to many
	 */	
	public function course()
	{
		return $this->belongsTo('App\Models\Course');
	}

	/**
	 * Relationship one to many
	 */
	public function activities()
	{
		return $this->hasMany('App\Models\Activity');
	}

}
