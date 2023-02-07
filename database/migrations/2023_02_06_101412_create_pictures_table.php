<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('renting_id');
            $table->blob('image');
            $table->smallInteger('order');
            $table->text('description');

            $table->foreign('renting_id')->references('id')->on('rentings')->onDelete('cascade');
            // TODO1: Test if deleting a rentings delete all associated picture and not the opposite
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictures');
    }
};
