<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {

	protected $guarded = ['id'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['content', 'activity_id'];

	/**
	 * Inverse of the relationship one to many
	 */	
	public function activity()
	{
		return $this->belongsTo('App\Models\Activity');
	}

}
