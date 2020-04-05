<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportsUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $newestReport;

    public function __construct() {
        $this->newestReport = $this->findNewestReport();
    }

    public function build() {
        return $this
            ->from(env('INFO_EMAIL'), 'Koronavirus Slovenija')
            ->subject('Novo dnevno poročilo')
            ->view('emails.reports_updated');
    }

    private function findNewestReport() {
        return Report::query()
            ->whereNotNull('new_cases')
            ->latest('reported_at')
            ->first();
    }
}
