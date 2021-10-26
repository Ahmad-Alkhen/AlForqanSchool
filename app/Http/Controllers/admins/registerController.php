<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerRequest;
use App\Models\admins\Admin;
use App\Models\admins\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{

    public function index(){

        if (Auth::user()->permission =='1'){
            $registers= Register::with(['admin'=>function($q){$q->select('id','name');}])->get();
        }
        else
             $registers= Register::where('admin_id',Auth::id())-> get();
        return view('admin.registers.index',compact('registers'));
    }

    public function create(){
        if (Auth::user()->permission =='1'){
            $admins= Admin::select('id','name')->get();
            return view('admin.registers.create',compact('admins'));
        }else
        return view('admin.registers.create');
    }

    public function store(registerRequest $request){

        try {
            if (!$request->has('active')){
                $active= 0 ;
            }else
                $active = $request->active;

            if ($request->has('admin_id')){
                $admin_id= $request->admin_id ;
            }else
                $admin_id = Auth::id();


            Register::create([
                   'name'=>$request->name,
                   'date'=>$request->date,
                   'admin_id'=>$admin_id,
                   'active'=>$active,
               ]);
                toast('تمت الإضافة بنجاح','success');
              return redirect()->route('admin.register.index')->with(['success'=>'تمت الإضافة بنجاح']);

        }catch (\Exception $exception){

          toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }
    }

    public function edit($registerId){
        $register =Register::find($registerId);
        if(!$register)
            return redirect()->route('admin.register.index')->with(['error' =>'السجل غير موجود' ]);
        else
            if (Auth::user()->permission =='1'){
                $admins= Admin::select('id','name')->get();
                return view('admin.registers.edit',compact('admins','register'));
            }else
              return view('admin.registers.edit',compact('register'));
    }

    public function update(registerRequest $request,$registerId){
        try {

            $register =Register::find($registerId);
            if(!$register)
                return redirect()->route('admin.register.index');
            else{
                if (!$request->has('active')){
                    $active= 0 ;
                }else
                    $active = $request->active;

                if ($request->has('admin_id')){
                    $admin_id= $request->admin_id ;
                }else
                    $admin_id = Auth::id();

                $register->update([
                    'name'=>$request->name,
                    'date'=>$request->date,
                    'admin_id'=>$admin_id,
                    'active'=>$active,
                ]);
                  toast('تمت التعديل بنجاح','success');
                return redirect()->route('admin.register.index')->with(['success'=>'تمت التعديل بنجاح']);
            }
        }catch (\Exception $exception){
            toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }
    }


    public function delete($registerId){

        $register =Register::find($registerId) ;

        if(!$register){
            return redirect()->route('admin.register.index')->with(['error' =>'السجل غير متوفر' ]);
        }

        $register->delete();
             toast('تم الحذف بنجاح','success');
          return redirect()->route('admin.register.index')->with(['success' =>'تم الحذف بنجاح' ]);
    }

}
