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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('town_id');
            $table->unsignedBigInteger('placetype_id');
            $table->string('name');
            $table->string('about');
            $table->float('lng');
            $table->float('lat');
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');
            $table->foreign('placetype_id')->references('id')->on('placetypes')->onDelete('cascade');
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
        Schema::dropIfExists('places');
    }
};
