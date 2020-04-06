<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentToSubscribersTable extends Migration
{
    public function up() {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->text('comment')->nullable();
        });
    }

    public function down() {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropColumn('comment');
        });
    }
}
