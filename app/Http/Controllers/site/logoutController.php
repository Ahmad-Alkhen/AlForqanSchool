<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    public function index(){
        Auth::logout();
        return redirect()->route('site.getLogin');
        //return redirect('/');

    }
}
