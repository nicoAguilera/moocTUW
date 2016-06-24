<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompositeKeysToTeachersDictateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teachers_dictate', function(Blueprint $table)
		{
			$table->primary(['user_id', 'course_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teachers_dictate', function(Blueprint $table)
		{
			$table->dropPrimary('users_id_primary', 'course_id_primary');
		});
	}

}
