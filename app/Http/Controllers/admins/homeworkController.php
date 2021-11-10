<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\homeworkRequest;

use App\Models\admins\Homework;
use App\Models\admins\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeworkController extends Controller
{

    public function index(){

        if (Auth::user()->permission =='1'){
            $homeworks=Homework::with(['register'=>function($q){
                $q->select('id','name');}])->
            with(['admin'=>function($q){
                $q->select('id','name');}])
                ->get();
        }else{
            $homeworks=Homework::with(['register'=>function($q){
                $q->select('id','name');}])
                ->where('admin_id',Auth::id())
                ->get();
        }

        return view('admin.homeworks.index',compact('homeworks'));
    }

    public function create(){
        if (Auth::user()->permission =='1'){
            $registers= Register::where('active','1')-> get();

        }else{
            $registers= Register::where('admin_id',Auth::id())->where('active','1')-> get();
        }

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
       //return $exception ;
        toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
            return redirect()->route('admin.homework.index');
        }
    }

    public function delete(Request $request){
        $homeworkId=  $request->id;
        $homework =Homework::find($homeworkId) ;

        if($homework){
            $homework->delete();
        }
    }




}
