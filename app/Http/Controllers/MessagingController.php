<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagingController extends Controller
{
    public function inbox(Request $request){

        $messages = Auth::user()->allUnreadMessages()->paginate(50);

        return view('messaging.messages', ['messages' => $messages]);
    }
}
