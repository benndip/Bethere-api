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
        Schema::create('placetype_towns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('placetype_id');
            $table->unsignedBigInteger('town_id');
            $table->foreign('placetype_id')->references('id')->on('placetypes');
            $table->foreign('town_id')->references('id')->on('towns');
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
        Schema::dropIfExists('placetype_towns');
    }
};
