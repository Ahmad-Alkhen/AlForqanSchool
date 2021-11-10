<?php

namespace App\Http\Controllers\admins;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Http\Requests\userUploadRequest;
use App\Imports\usersImport;
use App\Models\admins\Notification;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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

                if (Auth::user()->permission !='1'){
                    Notification::create([
                    'admin_id'=>Auth::id(),
                    'event'=> ' تم إضافة الطالب '  .  $request->name .   ' من قبل المشرف  '  .  Auth::user()->name  ,
                    'date'=>now(),
                ]);
                }

                return redirect()->route('admin.user.index')->with(['success'=>'تمت الإضافة بنجاح']);
            }

        }catch (\Exception $exception){
            // return $exception;
            toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
            return redirect()->route('admin.user.index');
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

                    if (Auth::user()->permission !='1') {
                        Notification::create([
                            'admin_id' => Auth::id(),
                            'event' => ' تمت تعديل معلومات الطالب ' . $request->name . ' من قبل المشرف  ' . Auth::user()->name,
                            'date' => now(),
                        ]);
                    }
                    return redirect()->route('admin.user.index')->with(['success'=>'تم التعديل بنجاح']);
                }
            }
        }catch (\Exception $exception){
            toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
            return redirect()->route('admin.user.index');
        }
    }

    public function delete($userId){

        $user =User::find($userId) ;

        if(!$user){
            return redirect()->route('admin.user.index')->with(['error' =>'الطالب غير مسجل' ]);
        }

        $user->delete();
             toast('تم الحذف بنجاح','success');

             if (Auth::user()->permission !='1') {
                Notification::create([
                'admin_id' => Auth::id(),
                'event' => ' تم حذف الطالب ' . $user->name . ' من قبل المشرف  ' . Auth::user()->name,
                'date' => now(),
            ]);
            }

          return redirect()->route('admin.user.index')->with(['success' =>'تم الحذف بنجاح' ]);
    }

    public function download(){

        $file = public_path(). "/files/upload-students.xlsx";
        return  \Response::download($file, 'upload-students.xlsx');
    }
    public function import()
    {
        return view('admin.users.import');

    }
    public function upload(userUploadRequest $request)
    {
        try {

            Excel::import(new usersImport, $request->import);
            toast('تمت الإضافة بنجاح','success');

            return redirect()->route('admin.user.import')->with(['success'=>'تمت الإضافة بنجاح']);
        }catch (\Exception $exception){
            // return $exception;
            toast('يرجى التأكد من المعلومات المدخلة','error');
            return redirect()->route('admin.user.import');

        }


    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }


}




