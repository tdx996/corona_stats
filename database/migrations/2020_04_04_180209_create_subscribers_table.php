<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    public function up() {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email', 250);
            $table->ipAddress('ip_address');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('subscribers');
    }
}
