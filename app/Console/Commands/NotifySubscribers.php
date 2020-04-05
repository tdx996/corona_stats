<?php

namespace App\Console\Commands;

use App\Mail\ReportsUpdated;
use App\Models\Subscriber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifySubscribers extends Command
{
    protected $signature = 'subscribers:notify';
    protected $description = 'Send emails to subscribers.';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        Subscriber::all()
            ->pluck('email')
            ->each(function ($address) {
                Mail::to([$address])->send(new ReportsUpdated);

                $this->line($address);
            });
    }
}
