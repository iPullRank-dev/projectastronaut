<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameProspectscoresTable extends Migration
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
            $table->renameColumn('final_score', 'final_grade');
            $table->renameColumn('quad1', 'unnatural_link');
            $table->renameColumn('quad2', 'spam_score');
            $table->renameColumn('quad3', 'trust_metrics');
            $table->renameColumn('quad4', 'link_popularity');

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
            $table->renameColumn('final_grade','final_score');
            $table->renameColumn('unnatural_link','quad1');
            $table->renameColumn('spam_score','quad2');
            $table->renameColumn('trust_metrics','quad3');
            $table->renameColumn('link_popularity','quad4');

        });
    }
}
