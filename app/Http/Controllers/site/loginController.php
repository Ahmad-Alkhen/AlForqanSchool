<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;



class loginController extends Controller
{
    public function getLogin(){
        return view('site.login');
    }

    public function login(loginRequest $request){
        try {
            if(DB::connection()->getDatabaseName()) {
                //$remember_me = $request->has('remember_me') ? true : false;

                if (auth()->guard('web')->attempt(['user_name' => $request->input('user_name'), 'password' => $request->input('password'), 'active' => 1] )) {
                    // Session::put('userName', $request->name);
                    return redirect()->route('site.dash');
                } else {
                    toast('اسم المستخدم أو كلمة المرور غير صحيحة ', 'error');
                    return redirect()->route('site.getLogin')->with(['error' => 'يوجد خطأ في بيانات الدخول']);
                }
            }
        }catch (\Exception $exception){
            die("Could not open connection to database server.  Please check your configuration.");
        }


    }
}
