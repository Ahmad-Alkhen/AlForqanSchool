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

     $registers= Register::where('admin_id',Auth::id())-> get();
        return view('admin.registers.index',compact('registers'));
    }

    public function create(){
        return view('admin.registers.create');
    }

    public function store(registerRequest $request){

        try {
            if (!$request->has('active')){
                $active= 0 ;
            }else
                $active = $request->active;

               Register::create([
                   'name'=>$request->name,
                   'date'=>$request->date,
                   'admin_id'=>Auth::id(),
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

                $register->update([
                    'name'=>$request->name,
                    'date'=>$request->date,
                    'admin_id'=>Auth::id(),
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
