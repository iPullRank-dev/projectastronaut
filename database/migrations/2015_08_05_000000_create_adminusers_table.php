<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminusers', function (Blueprint $table) {
        		
        	$table->engine = 'InnoDB';
			
            // Primary Auto Incrementing Index
			$table->increments('id');
			
			// self explanatory
            $table->string('username')->unique();
            $table->string('password');
			
			// can be used for access control to features; laravel might have a canned solution
			$table->integer('level');
			
			// can this user log in? laravel might have a canned solution
			$table->boolean('activated');
			
			// can be used to lock user accounts to avoid hacking; laravel might have a canned solution
			$table->integer('failed_logins');
			
			// soft delete flag, automagically managed
			$table->softDeletes();
			
			// auto updated created_at and modified_at columns for EloquentORM, automagically managed
            $table->timestamps();
            
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('adminusers');
    }
}