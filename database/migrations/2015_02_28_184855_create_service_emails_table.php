<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_emails', function($table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->integer('user_id')->unsigned();
            $table->boolean('is_alias');
            $table->integer('mail_database_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('users', function($table)
        {
            $table->integer('service_email_id')->unsigned()->nullable();
            $table->foreign('service_email_id')->references('id')->on('service_emails')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('service_emails', function($table)
        {
            $table->dropForeign('service_emails_user_id_foreign');
        });
        Schema::table('users', function($table)
        {
            $table->dropForeign('users_service_email_id_foreign');
        });
        Schema::drop('service_emails');
    }

}
