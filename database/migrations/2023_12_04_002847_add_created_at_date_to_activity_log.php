<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAtDateToActivityLog extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('activity_log', function (Blueprint $table) {
            $table->date('created_at_date')->after('created_at')->nullable();
        });

        // Update existing records with the appropriate date values
        DB::table('activity_log')->update(['created_at_date' => DB::raw('DATE(created_at)')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('activity_log', function (Blueprint $table) {
            $table->dropColumn('created_at_date');
        });
    }
}
