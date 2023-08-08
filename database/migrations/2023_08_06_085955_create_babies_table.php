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
            $table->integer('babyAge');
            $table->string('babyGender');
            $table->string('babyNationality');
            $table->string('phic');
    
            // Father's Information
            $table->string('fatherLastName');
            $table->string('fatherFirstName');
            $table->string('fatherMiddleName')->nullable();
    
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('babies');
    }
};
