<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribersController extends Controller
{
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        Subscriber::create([
            'email'      => $request->get('email'),
            'comment'    => $request->get('comment'),
            'ip_address' => $request->ip()
        ]);

        session()->flash('success', 'Naročili ste se na obveščanje!');

        return redirect()->back();
    }
}
