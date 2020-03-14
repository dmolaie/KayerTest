<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Menu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name');
            $table->text('title')->nullable();
            $table->string('alias')->nullable()->unique();
            $table->enum('type', array_values(config('menus.menus_type')));
            $table->string('link')->nullable();
            $table->enum('language', config('menus.menu_language'));
            $table->dateTime('publish_date');
            $table->bigInteger('editor_id')->unsigned()->nullable();
            $table->bigInteger('publisher_id')->unsigned();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('priority')->nullable()->unsigned();
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('editor_id')->on('users')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('parent_id')->on('menus')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('publisher_id')->on('users')
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
        Schema::dropIfExists('menus');
    }
}
