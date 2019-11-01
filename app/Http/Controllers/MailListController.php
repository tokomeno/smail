<?php

namespace App\Http\Controllers;

use App\MailList;
use Illuminate\Http\Request;

class MailListController extends Controller
{
    public function index()
    {
        return view("pages.mail_list", ["mail_list" => MailList::paginate(100)]);
    }
}