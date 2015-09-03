<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailAndTokenToAdminusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adminusers', function (Blueprint $table) {
            //
            $table->string('email')->unique();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adminusers', function (Blueprint $table) {
            //
            $table->dropColumn(['email', 'remember_token']);
        });
    }
}
