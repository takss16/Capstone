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
        Schema::create('date_time_reasons', function (Blueprint $table) {
            $table->id();
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->text('reason');
            $table->unsignedBigInteger('appointment_patient_id'); // Add this foreign key
            $table->timestamps();
            
            // Define foreign key constraints with onDelete('cascade')
            $table->foreign('appointment_patient_id')
                ->references('id')
                ->on('appointment_patient')
                ->onDelete('cascade'); // This sets up cascading deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_time_reasons');
    }
};
