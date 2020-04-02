<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollResultsTable extends Migration
{
    public function up() {
        Schema::create('poll_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_id')->constrained();
            $table->ipAddress('ip_address');
            $table->integer('value');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('poll_results');
    }
}
