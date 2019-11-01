<?php

namespace App\Http\Controllers;

use App\Jobs\SendMails;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function index()
    {

        return view("mails.index");
    }


    public function save(Request $request)
    {
        $request->validate([
            "subject" => "required|max:30",
            "text" => "required"
        ]);
        SendMails::dispatch($request->subject, $request->text);

        return back()->with("status", 'Mail Campain has been started');
    }
}