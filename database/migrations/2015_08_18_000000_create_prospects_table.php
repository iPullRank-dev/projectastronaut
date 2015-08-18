
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
        		
        	$table->engine = 'InnoDB';
			
			// Primary Auto Incrementing Index
			$table->increments('id');
			
			// full contact api data, pull using URL from data spreadsheet & insert
			$table->string('fc_company_name');
			$table->string('fc_logo_url');
			$table->string('fc_website');
			$table->integer('fc_approx_employees');
			$table->string('fc_founded');
			$table->string('fc_overview');
			$table->string('fc_address_line1');
			$table->string('fc_address_line2');
			$table->string('fc_address_locality');
			$table->string('fc_address_region_name');
			$table->string('fc_address_postal_code');
			$table->string('fc_address_country_name');
			
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
        Schema::drop('prospects');
    }
}

