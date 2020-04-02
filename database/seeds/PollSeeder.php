<?php

use App\Models\Poll;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    public function run() {
        Poll::create([
            'question' => 'Vas je strah da se boste okužili?',
            'scale' => ['Ne', 'Malo', 'Zelo'],
        ]);
    }
}
