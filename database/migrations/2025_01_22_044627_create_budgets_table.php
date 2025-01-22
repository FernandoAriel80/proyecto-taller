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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicles_in_workshop_id');
            $table->string('status'); //"Pendiente", "Aprobado", "Rechazado"
            $table->timestamps();

            $table->foreign('vehicles_in_workshop_id')->references('id')->on('vehicles_in_workshop');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
