
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
			$table->string('fc_company_name')->nullable();
			$table->string('fc_logo_url')->nullable();
			$table->string('fc_website')->nullable();
			$table->integer('fc_approx_employees')->nullable();
			$table->string('fc_founded')->nullable();
			$table->string('fc_overview')->nullable();
			$table->string('fc_address_line1')->nullable();
			$table->string('fc_address_line2')->nullable();
			$table->string('fc_address_locality')->nullable();
			$table->string('fc_address_region_name')->nullable();
			$table->string('fc_address_postal_code')->nullable();
			$table->string('fc_address_country_name')->nullable();
			
			// raw JS, HTML, etc for retargeting this specific company
			$table->longText('retargeting_script');
			
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

