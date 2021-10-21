<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function index(){
        $users= User:: get();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(userRequest $request){

        try {
            if (!$request->has('active')){
                $active= 0 ;
            }else
                $active = $request->active;

               User::create([
                   'name'=>$request->name,
                   'user_name'=>$request->user_name,
                   'password'=>bcrypt($request->password),
                   'phone'=>$request->phone,
                   'address'=>$request->address,
                   'birthday'=>$request->birthday,
                   'active'=>$active,
               ]);
                toast('تمت الإضافة بنجاح','success');
              return redirect()->route('admin.user.index')->with(['success'=>'تمت الإضافة بنجاح']);

        }catch (\Exception $exception){
            return $exception;
       //     toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }
    }

    public function edit($userId){
        $user =User::find($userId);
        if(!$user)
            return redirect()->route('admin.user.index')->with(['error' =>'الطالب غير مسجل' ]);
        else
        return view('admin.users.edit',compact('user'));
    }

    public function update(userRequest $request,$userId){
        try {

            $user =User::find($userId);
            if(!$user)
                return redirect()->route('admin.user.index');
            else{
                if (!$request->has('active')){
                    $active= 0 ;
                }else
                    $active = $request->active;

                $user->update([
                        'name'=>$request->name,
                        'user_name'=>$request->user_name,
                        'password'=>bcrypt($request->password),
                        'phone'=>$request->phone,
                        'address'=>$request->address,
                        'birthday'=>$request->birthday,
                        'active'=>$active,
                ]);
                  toast('تم التعديل بنجاح','success');
                return redirect()->route('admin.user.index')->with(['success'=>'تم التعديل بنجاح']);
            }
        }catch (\Exception $exception){
            toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }
    }


    public function delete($userId){

        $user =User::find($userId) ;

        if(!$user){
            return redirect()->route('admin.user.index')->with(['error' =>'الطالب غير مسجل' ]);
        }

        $user->delete();
             toast('تم الحذف بنجاح','success');
          return redirect()->route('admin.user.index')->with(['success' =>'تم الحذف بنجاح' ]);
    }

}
