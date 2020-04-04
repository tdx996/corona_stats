<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerVotesTable extends Migration
{
    public function up() {
        Schema::create('answer_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('answer_id');
            $table->tinyInteger('value');
            $table->ipAddress('ip_address');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign('answer_votes_answer_id_foreign');
        });
        Schema::dropIfExists('answer_votes');
    }
}
