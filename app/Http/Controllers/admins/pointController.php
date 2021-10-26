<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\pointRequest;
use App\Http\Requests\registerRequest;
use App\Models\admins\Admin;
use App\Models\admins\Point;
use App\Models\admins\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pointController extends Controller
{

    public function index(){

        if (Auth::user()->permission =='1'){
            $points=Point::with(['user'=>function($q){
                $q->select('id','name');}])->
            with(['register'=>function($q){
                $q->select('id','name');}])
            ->get();
        }else{

        $points=Point::with(['user'=>function($q){
                                            $q->select('id','name');}])->
                     with(['register'=>function($q){
                         $q->select('id','name');}])
                    ->where('admin_id',Auth::id())
                     ->get();
        }
        return view('admin.points.index',compact('points'));
    }

    public function create(){

        if (Auth::user()->permission =='1'){
            $registers= Register::where('active','1')-> get();

        }else
            $registers= Register::where('admin_id',Auth::id())->where('active','1')-> get();


        $users=User::select('id','name')->where('active','1')->orderBy('name')->get();
        return view('admin.points.create',compact('users','registers'));
    }

    public function store(pointRequest $request){

        try {

               Point::create([
                   'admin_id'=>Auth::id(),
                   'user_id'=>$request->user_id,
                   'register_id'=>$request->register_id,
                   'points'=>$request->points,
                   'info'=>$request->info,
                   'date'=>now(),
               ]);
                toast('تمت الإضافة بنجاح','success');
            return redirect()->route('admin.point.create')->with(['success'=>'تمت الإضافة بنجاح']);

        }catch (\Exception $exception){
     //   return $exception ;
         toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
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
