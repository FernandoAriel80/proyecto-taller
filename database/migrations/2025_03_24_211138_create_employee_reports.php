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
        Schema::create('employee_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assigned_employee_id');
            $table->text('description');
            $table->timestamps();

            $table->foreign('assigned_employee_id')->references('id')->on('assigned_employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
