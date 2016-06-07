<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCourseIdToModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('modules', function(Blueprint $table)
		{
			//Foreign key
			$table->integer('course_id')->unsigned();

			$table->foreign('course_id')
					->references('id')->on('courses')
					->onUpdate('cascade')
					->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('modules', function(Blueprint $table)
		{
			$table->dropForeign('modules_course_id_foreign');

			$table->dropColumn('course_id');
		});
	}

}
