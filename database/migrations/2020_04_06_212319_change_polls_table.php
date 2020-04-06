<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePollsTable extends Migration
{
    public function up() {
        Schema::table('polls', function(Blueprint $table) {
            $table->renameColumn('scale', 'options');
        });
    }

    public function down() {
        Schema::table('polls', function(Blueprint $table) {
            $table->renameColumn('options', 'scale');
        });
    }
}
