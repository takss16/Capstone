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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total_discount', 10, 2);
            $table->boolean('status')->default(true); // "true" might mean "active" in your context
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('bills');
    }
    
};
