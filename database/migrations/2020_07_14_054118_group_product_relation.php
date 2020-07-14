<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupProductRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_group', function (Blueprint $table) {
            $table->foreign('group_id')->unsignedInteger()
                ->references('id')
                ->on('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('product_id')->unsignedInteger()
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_group', function (Blueprint $table) {
            $table->dropForeign('product_group_group_id_foreign');
        });
        Schema::table('product_group', function (Blueprint $table) {
            $table->dropForeign('product_group_product_id_foreign');
        });
    }
}
