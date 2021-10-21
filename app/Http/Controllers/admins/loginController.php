<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;

use mysql_xdevapi\Exception;
use RealRashid\SweetAlert\Facades\Alert;



class loginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function login(loginRequest $request){

            $remember_me = $request->has('remember_me')?true:false ;

            if(auth()->guard('admin')->attempt(['user_name'=>$request->input('user_name'),'password'=>$request->input('password'),'active'=>1],$remember_me)){
               // Session::put('userName', $request->name);
                return redirect()->route('admin.dash');
            }
            else{
                toast('اسم المستخدم أو كلمة المرور غير صحيحة ','error');
                return redirect()->route('admin.getLogin')->with(['error'=>'يوجد خطأ في بيانات الدخول']);
            }

    }
}
