<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotCompleteRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        dd(\DB::connection('mongodb'));

        Schema::connection('mongodb')->create('sms_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->index('mobile');
            $table->index('national_code');
            $table->index('birth_date');
            $table->unique(['national_code']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_registers');
    }
}
