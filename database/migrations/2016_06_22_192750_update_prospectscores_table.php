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
            $table->dropColumn(['unnatural_links','spam_score','trust_metrics','link_popularity']);

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
            $table->dropColumn(['quad1','quad2','quad3','quad4','rank']);

            $table->integer('unnatural_links'); 
            $table->integer('spam_score');
            $table->integer('trust_metrics');
            $table->integer('link_popularity');

        });
    }
}
