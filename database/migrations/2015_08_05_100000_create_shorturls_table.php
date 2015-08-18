<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shorturls', function (Blueprint $table) {
        		
        	$table->engine = 'InnoDB';
			
			// Primary Auto Incrementing Index
			$table->increments('id');
			
            // foreign key to prospects table for displaying links by company
            $table->integer('company_id')->index();
			
			// foreign key to prospectusers table for displaying links by user
			$table->integer('user_id')->index();
			
			// has this link ever been visited? 0 or 1; if 1 check cookie value against uuid
            $table->boolean('visited');
			
			// unique id for the user, generated client side and set as an evercookie
			$table->string('uuid');
			
			// soft delete flag, automagically managed
			$table->softDeletes();
			
			// auto updated created_at and modified_at columns for EloquentORM, automagically managed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shorturls');
    }
}