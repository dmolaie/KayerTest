<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPriorityToRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->integer('priority')->after('type')->unsigned()->default(3);
    });
        Schema::table('roles', function (Blueprint $table) {
            DB::statement("UPDATE `roles` SET `priority` = '1' WHERE `roles`.`type` = 'admin';");
            DB::statement("UPDATE `roles` SET `priority` = '2' WHERE `roles`.`type` = 'manager';");
            DB::statement("UPDATE `roles` SET `priority` = '4' WHERE `roles`.`type` = 'client';");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('priority');
        });
    }
}
