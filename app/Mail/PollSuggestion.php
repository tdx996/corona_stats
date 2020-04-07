<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PollSuggestion extends Mailable
{
    use Queueable, SerializesModels;

    public $question, $answers;

    public function __construct(string $question, array $answers = []) {
        $this->question = $question;
        $this->answers = $answers;
    }

    public function build()
    {
        return $this
            ->subject('Predlog za anketo')
            ->from(env('INFO_EMAIL'))
            ->view('emails.poll_suggestion');
    }
}
