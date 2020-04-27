<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            DB::statement("ALTER TABLE `categories` CHANGE `type` `type` ENUM(
              'news',
              'article',
              'event',
              'image',
              'video',
              'voice',
              'text') 
            CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;");
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
