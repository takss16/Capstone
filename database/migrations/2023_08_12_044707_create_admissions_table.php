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
    Schema::create('admissions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('patient_id_addmit');
        $table->date('admission_date');
        $table->date('discharge_date')->nullable(); // This line makes the field nullable
        $table->string('admission_diagnosis');
        $table->string('services_performed')->nullable();
        $table->string('final_diagnosis')->nullable();
        $table->boolean('status')->default(true); // "true" might mean "active" in your context
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
