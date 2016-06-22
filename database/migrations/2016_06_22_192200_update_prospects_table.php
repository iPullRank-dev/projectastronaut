<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prospects', function (Blueprint $table) {
            //
            $table->dropColumn(['retargeting_script']);

            $table->text('code_zone')->nullable();

            $table->string('account_with')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prospects', function (Blueprint $table) {
            //
            $table->dropColumn(['code_zone','account_with']);

            $table->longText('retargeting_script');
        });
    }
}
