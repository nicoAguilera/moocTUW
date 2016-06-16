<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {

	protected $guarded = ['id'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'module_id'];

	/**
	 * Inverse of the relationship one to many
	 */	
	public function course()
	{
		return $this->belongsTo('App\Models\Module');
	}

}
