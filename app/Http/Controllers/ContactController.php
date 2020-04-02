<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function show() {
        return view('contact');
    }

    public function send(Request $request) {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email'     => 'required|email',
            'content'   => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        Mail::send('emails.default', $request->only('full_name', 'email', 'content'), function ($message) use ($request) {
            $message->from(env('INFO_EMAIL'), $request->get('full_name'));
            $message->subject("Sporočilo od {$request->get('full_name')}");

            $message->to(env('INFO_EMAIL'));
        });

        $request->session()->flash('success', 'Sporočilo uspešno poslano.');

        return redirect()->back();
    }
}
