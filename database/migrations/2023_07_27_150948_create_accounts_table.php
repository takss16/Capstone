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
    Schema::create('accounts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('patient_id')->nullable();
        $table->string('username')->unique();
        $table->string('password');
        $table->timestamps();

        // Add the foreign key constraint
        $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('accounts');
}
};
