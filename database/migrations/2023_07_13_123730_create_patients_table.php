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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('midlename')->nullable();
            $table->integer('age');
            $table->string('birthday');
            $table->string('civilstatus');
            $table->string('contact');
            $table->string('address');
            $table->boolean('philhealth_beneficiary');
            $table->boolean('status')->default(true); // "true" might mean "active" in your context
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
