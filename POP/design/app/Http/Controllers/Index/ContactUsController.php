<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Lib\Tdk;

class ContactUsController extends Controller
{

    public function __invoke()
    {
        return view('index.contactus', [
            'tdk' => Tdk::contact()
        ]);
    }
}
