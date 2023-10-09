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
        Schema::create('babies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id_baby')->constrained()->onDelete('cascade');
    
            // Baby's Information
            $table->string('babyLastName');
            $table->string('babyGivenName');
            $table->string('babyMiddleName')->nullable();
            $table->string('babyAddress');
            $table->date('babyDOB');
            $table->time('babyTOB');
            $table->string('babyAge')->nullable();
            $table->string('babyGender');
            $table->string('babyNationality');
            $table->string('phic');
    
            // Father's Information
            $table->string('fatherLastName')->nullable();;
            $table->string('fatherFirstName')->nullable();;
            $table->string('fatherMiddleName')->nullable();
            $table->boolean('status')->default(true); // "true" might mean "active" in your context

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('babies');
    }
};
