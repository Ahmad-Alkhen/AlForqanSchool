<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminRequest;
use App\Models\admins\Admin;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class adminController extends Controller
{

    public function index(){

     $admins= Admin::where('permission','2')-> get();
        return view('admin.admins.index',compact('admins'));
    }

    public function create(){
        return view('admin.admins.create');
    }

    public function store(adminRequest $request){

        try {
            if (!$request->has('active')){
                $active= 0 ;
            }else
                $active = $request->active;

           $admin_username= Admin::where('user_name',$request->user_name)->get();
           if(count($admin_username) > 0){
                toast('!!هذا الحساب موجود بالفعل','error');
                return redirect()->route('admin.index')->with(['error'=>'!!هذا الحساب موجود بالفعل']);
            }
             else{
                 Admin::create([
                     'name'=>$request->name,
                     'user_name'=>$request->user_name,
                     'password'=>bcrypt($request->password),
                     'phone'=>$request->phone,
                     'address'=>$request->address,
                     'active'=>$active,
                 ]);
                 toast('تمت الإضافة بنجاح','success');
                 return redirect()->route('admin.index')->with(['success'=>'تمت الإضافة بنجاح']);
             }
        }catch (\Exception $exception){

           toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }
    }

    public function edit($adminId){
        $admin =Admin::find($adminId);
        if(!$adminId)
            return redirect()->route('admin.index')->with(['error' =>'الموجه غير موجود' ]);
        else
        return view('admin.admins.edit',compact('admin'));
    }

    public function update(adminRequest $request,$adminId){
        try {

            $admin =Admin::find($adminId);
            if(!$admin)
                return redirect()->route('admin.index');
            else{
                if (!$request->has('active')){
                    $active= 0 ;
                }else
                    $active = $request->active;

                $admin_username= Admin::where([['user_name',$request->user_name],['id','!=',$adminId]])->get();
                if(count($admin_username) > 0){
                    toast('!!هذا الحساب موجود بالفعل','error');
                    return redirect()->route('admin.index')->with(['error'=>'!!هذا الحساب موجود بالفعل']);
                }else{

                    $admin->update([
                        'name'=>$request->name,
                        'user_name'=>$request->user_name,
                        'password'=>bcrypt($request->password),
                        'phone'=>$request->phone,
                        'address'=>$request->address,
                        'active'=>$active,
                    ]);

                    toast('تم العديل بنجاح','success');
                    return redirect()->route('admin.index')->with(['success'=>'تم العديل بنجاح']);
                }

            }
        }catch (\Exception $exception){
           // toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
            return $exception;
        }
    }


    public function delete($adminId){

        $admin =Admin::find($adminId) ;

        if(!$admin){
            return redirect()->route('admin.index')->with(['error' =>'المشرف غير مسجل' ]);
        }

        $admin->delete();
             toast('تم الحذف بنجاح','success');
          return redirect()->route('admin.index')->with(['success' =>'تم الحذف بنجاح' ]);
    }

}
