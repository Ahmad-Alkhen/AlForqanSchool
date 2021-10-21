<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\homeworkRequest;
use App\Http\Requests\pointRequest;
use App\Http\Requests\registerRequest;
use App\Models\admins\Admin;
use App\Models\admins\Homework;
use App\Models\admins\Point;
use App\Models\admins\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeworkController extends Controller
{

    public function index(){


     $homeworks=Homework::with(['register'=>function($q){
                         $q->select('id','name');}])
                    ->where('admin_id',Auth::id())
                        ->get();

        return view('admin.homeworks.index',compact('homeworks'));
    }

    public function create(){

        $registers= Register::where('admin_id',Auth::id())->where('active','1')-> get();
        return view('admin.homeworks.create',compact('registers'));
    }

    public function store(homeworkRequest $request){

        try {
               Homework::create([
                   'register_id'=>$request->register_id,
                   'admin_id'=>Auth::id(),
                   'info'=>$request->info,
                   'date'=>now(),
               ]);
                toast('تمت الإضافة بنجاح','success');
              return redirect()->route('admin.homework.index')->with(['success'=>'تمت الإضافة بنجاح']);

        }catch (\Exception $exception){
       return $exception ;
        // toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }
    }


    public function delete(Request $request){
        $pointId=  $request->id;
        $point =Point::find($pointId) ;

        if($point){
            $point->delete();
        }
    }

}
