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

        if (Auth::user()->permission =='1'){
            $registers= Register::where('active','1')-> get();
            return view('admin.registerStds.index',compact('registers'));
        }else
        {
            $registers= Register::where('admin_id',Auth::id())->where('active','1')-> get();
            return view('admin.registerStds.index',compact('registers'));
        }
    }

    public function create(){

        if (Auth::user()->permission =='1'){
            $registers = Register::where('active','1')->get();
        }else
        $registers = Register::where('admin_id',Auth::id())->where('active','1')->get();

        $users = User::where('active','1')->get();

        return view('admin.registerStds.create',compact('registers','users'));
    }

    public function store(Request $request){

      try {


          $users_ids = $request->user_id;
          for($i=0 ; $i < count($users_ids); $i++){
              Registerstds::create([
                  'register_id'=>$request->register_id,
                  'user_id'=>$users_ids[$i],
              ]);
          }
                toast('تمت الإضافة بنجاح','success');
              return redirect()->route('admin.registerStd.create')->with(['success'=>'تمت الإضافة بنجاح']);

        }catch (\Exception $exception){
            return $exception ;
          // toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }
    }

    public function delete(Request $request){

        $registerStd =Registerstds::find($request->id) ;

        if($registerStd){

            $registerStd->delete();
          //  toast('تم الحذف بنجاح','success');
          //  return redirect()->route('admin.registerStd.index')->with(['success' =>'تم الحذف بنجاح' ]);
        }


    }

    public function change(Request $request){

   /*     $registerStds =Registerstds::select('id','user_id')->where('register_id',$request->registerId)->first() ;
        $usersId= explode(',',$registerStds->user_id);
        $usersName=User::select('id','name')->where('active','1')->whereIn('id',$usersId)->get();
        if(isset($usersId))
          return view('admin.registerStds.changeAjax',compact('usersId','usersName'));
    */

        $registerId = $request-> registerId ;
        $regUsers =  Registerstds::select('id','user_id')->where('register_id',$registerId)
            ->with(['user'=>function($q){
                $q->select('id','name')->where('active','1');
            }])->get();
        if(isset($regUsers))
            return view('admin.registerStds.changeAjax',compact('regUsers'));

    }


}
