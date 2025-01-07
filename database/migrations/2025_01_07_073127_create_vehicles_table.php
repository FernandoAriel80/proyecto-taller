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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate')->unique();
            $table->string('model');
            $table->integer('year');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('vehicle_type_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
