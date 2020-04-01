<?php


namespace App\Http\Controllers;


use App\Models\Report;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index() {
        $reports = Report::all();

        $dateLabels = $reports->pluck('reported_at')->map(function(Carbon $date) {
            return $date->format('M d');
        })->toArray();

//        dd($reports->pluck('reported_at')->toArray());

        return view('home', compact('reports', 'dateLabels'));
    }
}
