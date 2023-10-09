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
        Schema::create('maternal_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id_maternal'); // Use a different name for the foreign key
            // Add your columns related to maternal records here
            $table->text('medical_history');
            $table->date('lmp');
            $table->date('edc')->nullable();
            $table->string('aog')->nullable();
            $table->string('fht')->nullable();
            $table->string('pres')->nullable();
            $table->string('st')->nullable();
            $table->string('effacement')->nullable();
            $table->string('cervical_dilatation')->nullable();
            $table->integer('bp');
            $table->string('bow')->nullable();
            $table->string('color')->nullable();
            $table->string('time_rupture')->nullable();
            $table->string('condition')->nullable();
            $table->string('gravidity')->nullable();
            $table->string('parity')->nullable();
            $table->boolean('status')->default(true); // "true" might mean "active" in your context
            $table->timestamps();

            // Add the foreign key constraint to link maternal records to patients
            $table->foreign('patient_id_maternal')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maternal_records');
    }
};
