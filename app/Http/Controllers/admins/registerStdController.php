<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerRequest;
use App\Models\admins\Admin;
use App\Models\admins\Register;
use App\Models\admins\Registerstds;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class registerStdController extends Controller
{

    public function index(){

     $registers= Register::where('admin_id',Auth::id())->where('active','1')-> get();
        return view('admin.registerStds.index',compact('registers'));
    }

    public function create(){
        $registers = Register::where('active','1')->get();
        $users = User::where('active','1')->get();

        return view('admin.registerStds.create',compact('registers','users'));
    }

    public function store(Request $request){

      try {
       //   $users_id =  json_encode($request->user_id);
          $users_id =  implode(',',$request->user_id);
          Registerstds::create([
                   'register_id'=>$request->register_id,
                   'user_id'=>$users_id,
               ]);
                toast('تمت الإضافة بنجاح','success');
              return redirect()->route('admin.register.index')->with(['success'=>'تمت الإضافة بنجاح']);

        }catch (\Exception $exception){
            return $exception ;
          // toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
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

    public function change(Request $request){

        $registerStds =Registerstds::select('id','user_id')->where('register_id',$request->registerId)->first() ;
        $usersId= explode(',',$registerStds->user_id);


        $usersName=User::select('id','name')->where('active','1')->whereIn('id',$usersId)->get();


        if(isset($usersId))
          return view('admin.registerStds.changeAjax',compact('usersId','usersName'));

    }


}
