<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('city_id')->constrained('cities');
            $table->dropColumn('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'city_id')) {
            Schema::table('users', function (Blueprint $table) {

                $table->dropForeign('city_id');
            });
            
        }
        Schema::table('users', function (Blueprint $table) {

            $table->string('city');
        });
        
    }
}
