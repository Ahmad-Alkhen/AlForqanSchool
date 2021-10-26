<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;


class dashController extends Controller
{
    public function index(){


       return view('site.dash');
    }
}
