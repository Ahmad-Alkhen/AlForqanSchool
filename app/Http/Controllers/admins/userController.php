<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Models\admins\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            $user_username= User::where('user_name',$request->user_name)->get();
            if(count($user_username) > 0){
                toast('!!هذا الحساب موجود بالفعل','error');
                return redirect()->route('admin.user.index')->with(['error'=>'!!هذا الحساب موجود بالفعل']);
            }
            else{
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

                Notification::create([
                    'admin_id'=>Auth::id(),
                    'event'=> ' تم إضافة الطالب '  .  $request->name .   ' من قبل المشرف  '  .  Auth::user()->name  ,
                    'date'=>now(),
                ]);


                return redirect()->route('admin.user.index')->with(['success'=>'تمت الإضافة بنجاح']);
            }

        }catch (\Exception $exception){
            //   return $exception;
            toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
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

                $user_username= User::where([['user_name',$request->user_name],['id','!=',$userId]])->get();
                if(count($user_username) > 0){
                    toast('!!هذا الحساب موجود بالفعل','error');
                    return redirect()->route('admin.user.index')->with(['error'=>'!!هذا الحساب موجود بالفعل']);
                }else{
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

                    Notification::create([
                        'admin_id'=>Auth::id(),
                        'event'=> ' تمت تعديل معلومات الطالب '  .  $request->name .   ' من قبل المشرف  '  .  Auth::user()->name  ,
                        'date'=>now(),
                    ]);

                    return redirect()->route('admin.user.index')->with(['success'=>'تم التعديل بنجاح']);
                }
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

        Notification::create([
            'admin_id'=>Auth::id(),
            'event'=> ' تم حذف الطالب '  .  $user->name .   ' من قبل المشرف  '  .  Auth::user()->name  ,
            'date'=>now(),
        ]);

          return redirect()->route('admin.user.index')->with(['success' =>'تم الحذف بنجاح' ]);
    }

}
