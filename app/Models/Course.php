<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	protected $guarded = ['id'];

	protected $fillable = ['name', 'description', 'start_date', 'end_date', 'active'];

}
