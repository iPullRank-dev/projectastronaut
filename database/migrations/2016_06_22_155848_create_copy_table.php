<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copytext', function (Blueprint $table) {
                
            $table->engine = 'InnoDB';
            
            // Primary Auto Incrementing Index
            $table->increments('id');
            
            $table->string('quad')->nullable();

            $table->mediumText('a')->nullable();

            $table->mediumText('b')->nullable();

            $table->mediumText('c')->nullable();

            $table->mediumText('d')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('copytext');
    }
}

