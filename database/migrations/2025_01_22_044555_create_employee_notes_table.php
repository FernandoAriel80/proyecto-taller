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
        Schema::create('employee_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicles_in_workshop_id');
            $table->unsignedBigInteger('employee_id');
            $table->text('description');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('vehicles_in_workshop_id')->references('id')->on('vehicles_in_workshop');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_notes');
    }
};
