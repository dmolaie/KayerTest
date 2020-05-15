<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableGenderCurrentCityProvinceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `users` CHANGE `gender` `gender` ENUM('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;");
            \DB::statement("ALTER TABLE `users` CHANGE `current_province_id` `current_province_id` INT(10) UNSIGNED null;");
            \DB::statement("ALTER TABLE `users` CHANGE `current_city_id` `current_city_id` INT(10) UNSIGNED null;");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
