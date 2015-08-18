<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospectusers', function (Blueprint $table) {
        		
        	$table->engine = 'InnoDB';
			
			// Primary Auto Incrementing Index
			$table->increments('id')->primary();
			
			// email address to send short link to
            $table->string('email')->unique();
            
            // single column for user's name
            $table->string('full_name');
			
			// job title
			$table->string('title');
			
			// user entered company name; will be used for manual association with company in prospects table
			$table->string('company');
			
			// foreign key to prospects table for displaying prospect users associated with a prospect company
			$table->integer('company_id')->index();
			
			// full contact API fields
			$table->string('fc_location_general');
			$table->string('fc_gravatar');
			
			// check if twitter is present under social, if so insert 1, else insert 0
			$table->boolean('fc_has_twitter');
			
			// check if facebook is present under social, if so insert 1, else insert 0
			$table->boolean('fc_has_facebook');
			
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
        Schema::drop('prospectusers');
    }
}