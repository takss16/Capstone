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
        Schema::create('check_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id_checkup')->constrained('patients');
            $table->date('visit_date');
            $table->time('visit_time');
            $table->text('reason');
            $table->date('next_visit')->nullable();
            $table->date('lmp')->nullable();
            $table->string('aog')->nullable();
            $table->date('edc')->nullable();
            $table->string('bp')->nullable();
            $table->string('weight')->nullable();
            $table->text('fh')->nullable();
            $table->string('fht')->nullable();
            $table->boolean('status')->default(true); // "true" might mean "active" in your context

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_ups');
    }
};
