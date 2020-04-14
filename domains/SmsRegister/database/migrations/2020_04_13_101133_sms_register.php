<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SmsRegister extends Migration
{
    protected $connection = 'mongodb';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->create('sms_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile_number')->index();
            $table->string('national_code')->index();
            $table->string('birth_date')->index();
            $table->json('request_content');
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
        Schema::connection($this->connection)->drop('sms_registers');
    }
}
