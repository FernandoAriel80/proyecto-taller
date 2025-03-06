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
        Schema::create('budget_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assigned_employee_id');
            $table->string('name');
            $table->integer('amount');
            $table->text('description');
            $table->decimal('price',8,2);
            $table->decimal('total_price',8,2);
            $table->timestamps();

            $table->foreign('assigned_employee_id')->references('id')->on('assigned_employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_items');
    }
};
