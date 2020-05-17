<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Arvanvod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arvanvod', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('uuid')->unique()->index();
            $table->bigInteger('user_id')->unsigned();
            $table->string('file_id');
            $table->text('link');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->on('users')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arvanvod');
    }
}
