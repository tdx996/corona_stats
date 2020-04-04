<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeReportsTable extends Migration
{
    public function up() {
        Schema::table('reports', function (Blueprint $table) {
            $table->renameColumn('new_intense_care', 'new_critical');
            $table->renameColumn('total_intense_care', 'total_critical');
            $table->integer('new_active')->nullable();
            $table->integer('total_active')->default(0);
        });
    }

    public function down() {
        Schema::table('reports', function (Blueprint $table) {
            $table->renameColumn('new_critical', 'new_intense_care');
            $table->renameColumn('total_critical', 'total_intense_care');
            $table->dropColumn('new_active');
            $table->dropColumn('total_active');
        });
    }
}
