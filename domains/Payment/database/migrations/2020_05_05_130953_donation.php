<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Donation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('uuid')->unique()->index();
            $table->string('fullname')->nullable();
            $table->string('national_code')->nullable();
            $table->string('phone')->nullable();
            $table->enum('type',config('payment.type_help.keys'))->nullable();
            $table->dateTime('amount');
            $table->softDeletes();
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
        Schema::dropIfExists('donation');

    }
}
