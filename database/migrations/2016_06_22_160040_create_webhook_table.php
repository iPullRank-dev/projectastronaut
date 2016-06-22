<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebhookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                Schema::create('webhook', function (Blueprint $table) {
                
            $table->engine = 'InnoDB';
            
            // Primary Auto Incrementing Index
            $table->increments('id');
            
            $table->longText('field')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('webhook');
    }
}
