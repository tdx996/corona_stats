<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecoveredToReports extends Migration
{
    public function up() {
        Schema::table('reports', function (Blueprint $table) {
            $table->integer('new_recovered')->nullable();
            $table->integer('total_recovered')->default(0);
        });
    }

    public function down() {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('new_recovered');
            $table->dropColumn('total_recovered');
        });
    }
}
