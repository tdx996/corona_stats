<?php

use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;
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

        $question = Question::create([
            'content' => 'Kakšno je vaše mnenje o omejitvi gibanja?'
        ]);
        Answer::insert([[
            'question_id' => $question->id,
            'full_name'   => 'Maruša',
            'ip_address'  => '127.0.0.1',
            'content'     => 'Se totalno strinjam! Še bolj stroge ukrepe bi bilo potrebno narediti, ker ljudje se enostavno  ne zavedajo, kako močan je ta virus.',
            'created_at'  => Carbon::create(2020, 4, 4, 9, 33),
            'updated_at'  => Carbon::create(2020, 4, 4, 9, 33),
        ], [
            'question_id' => $question->id,
            'full_name'   => 'Vlado',
            'ip_address'  => '127.0.0.1',
            'content'     => 'Kaj misli Janša, da bo potem vse rešeno? Naj poskrbi, da bo vsak imel možnost, da dobi zaščitne maske, rokavice in razkužilo. Ampak tega v mojem kraju ni dobiti že od kar se je pojavil ta virus. In kako naj se zaščitim zdaj!?',
            'created_at'  => Carbon::create(2020, 4, 4, 9, 55),
            'updated_at'  => Carbon::create(2020, 4, 4, 9, 55),
        ]]);

        $question = Question::create([
            'content' => 'Kaj v dani situaciji najbolj pogrešate?'
        ]);
        Answer::insert([[
            'question_id' => $question->id,
            'full_name'   => null,
            'ip_address'  => '127.0.0.1',
            'content'     => 'SVOBODO!',
            'created_at'  => Carbon::create(2020, 4, 4, 10, 33),
            'updated_at'  => Carbon::create(2020, 4, 4, 10, 33),
        ], [
            'question_id' => $question->id,
            'full_name'   => 'Ana',
            'ip_address'  => '127.0.0.1',
            'content'     => 'Kofetkanje  s frendicam',
            'created_at'  => Carbon::create(2020, 4, 4, 9, 43),
            'updated_at'  => Carbon::create(2020, 4, 4, 9, 43),
        ], [
            'question_id' => $question->id,
            'full_name'   => 'Vesna',
            'ip_address'  => '127.0.0.1',
            'content'     => 'Frizerja. Imam že tako goste lasje jaooo',
            'created_at'  => Carbon::create(2020, 4, 4, 8, 40),
            'updated_at'  => Carbon::create(2020, 4, 4, 9, 40),
        ], [
            'question_id' => $question->id,
            'full_name'   => null,
            'ip_address'  => '127.0.0.1',
            'content'     => 'Šport na televiziji',
            'created_at'  => Carbon::create(2020, 4, 4, 9, 13),
            'updated_at'  => Carbon::create(2020, 4, 4, 9, 13),
        ]]);
    }

    public function down() {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign('answers_question_id_foreign');
        });
        Schema::dropIfExists('question_answers');
    }
}
