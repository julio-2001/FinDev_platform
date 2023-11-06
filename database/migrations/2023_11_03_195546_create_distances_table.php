<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('distances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('start_location_id');
            $table->unsignedBigInteger('end_location_id');
            $table->integer('distance');
            $table->timestamps();

            $table->foreign('start_location_id')->references('id')->on('locations');
            $table->foreign('end_location_id')->references('id')->on('locations');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distances');
    }
};
