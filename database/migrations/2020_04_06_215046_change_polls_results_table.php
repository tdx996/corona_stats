<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePollsResultsTable extends Migration
{
    public function up() {
        Schema::table('poll_results', function (Blueprint $table) {
            $table->string('value', 150)->change();
        });
    }

    public function down() {
        Schema::table('poll_results', function (Blueprint $table) {
            $table->integer('value')->change();
        });
    }
}
