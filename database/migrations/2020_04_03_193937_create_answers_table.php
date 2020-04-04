<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    public function up() {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained();
            $table->text('content');
            $table->ipAddress('ip_address');
            $table->string('full_name')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign('answers_question_id_foreign');
        });
        Schema::dropIfExists('question_answers');
    }
}
