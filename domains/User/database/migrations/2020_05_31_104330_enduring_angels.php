<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnduringAngels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('angel')->after('is_active')->default(false);
            $table->string('date_death')->after('angel')->nullable();
            $table->string('image_profile')->after('date_death')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function (Blueprint $table) {
            $table->dropColumn('angel');
            $table->dropColumn('date_death');
            $table->dropColumn('image_profile');
        });
    }
}
