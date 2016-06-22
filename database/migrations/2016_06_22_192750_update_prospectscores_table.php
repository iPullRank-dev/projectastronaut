<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProspectscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prospectscores', function (Blueprint $table) {
            //
            $table->dropColumn(['unnatural_links','spam_score','trust_metrics','link_popularity','final_score']);

            $table->string('quad1')->nullable();

            $table->string('quad2')->nullable();

            $table->string('quad3')->nullable();

            $table->string('quad4')->nullable();

            $table->integer('rank')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prospectscores', function (Blueprint $table) {
            //
            $table->dropColumn(['code_zone','account_with']);

            $table->integer('unnatural_links'); 
            $table->integer('spam_score');
            $table->integer('trust_metrics');
            $table->integer('link_popularity');
            
            // final score formatted as 000.00 to 100.00
            $table->double('final_score', 5, 2);
        });
    }
}
