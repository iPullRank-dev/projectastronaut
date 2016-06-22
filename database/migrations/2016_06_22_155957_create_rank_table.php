<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('rank', function (Blueprint $table) {
                
            $table->engine = 'InnoDB';
            
            // Primary Auto Incrementing Index
            $table->increments('id');
            
            $table->text('company')->nullable();

            $table->text('vector_ranking')->nullable();

            $table->text('industry_ranking')->nullable();

            $table->text('inc_ranking')->nullable();

            $table->text('industry')->nullable();

            $table->float('revenue')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rank');
    }
}
