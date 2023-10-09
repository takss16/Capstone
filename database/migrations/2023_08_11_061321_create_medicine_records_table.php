<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('medicine_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('check_up_id')
                ->constrained('check_ups')
                ->onDelete('cascade'); // Add this line for cascading delete
            $table->string('medicine_name');
            $table->string('dosage');
            $table->string('frequency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_records');
    }
};
