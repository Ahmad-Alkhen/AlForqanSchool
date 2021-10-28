<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;

use App\Models\admins\Message;


class messageController extends Controller
{

    public function index(){

        $messages=Message::with(['user'=>function($q){$q->select('id','name');}])->orderby('id','DESC')->get();
        return view('admin.messages.index',compact('messages'));
    }


}
