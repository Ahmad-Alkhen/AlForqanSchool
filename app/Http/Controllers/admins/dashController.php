<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\admins\Admin;
use App\Models\admins\Notification;
use App\Models\admins\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class dashController extends Controller
{
    public function index(){

        $admins=Admin::where('active','1')->count();
        $users=User::where('active','1')->count();
        $subjects=Subject::count();
        $notes=Subject::count();

       return view('admin.dash',compact('admins','users','subjects','notes'));
    }
}
