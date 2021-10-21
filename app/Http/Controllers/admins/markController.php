<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\pointRequest;
use App\Http\Requests\registerRequest;
use App\Models\admins\Admin;
use App\Models\admins\Mark;
use App\Models\admins\Point;
use App\Models\admins\Register;
use App\Models\admins\Registerstds;
use App\Models\admins\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class markController extends Controller
{

    public function index(){


     $registers=Register::where('active','1')->where('admin_id',Auth::id())->get();
     $subjects=Subject::get();

        return view('admin.marks.index',compact('registers','subjects'));
    }


    public function show_sudent(Request $request){
      $registerId=  $request->registerId;
      $subjectId=  $request->subjectId;

        $students=Registerstds::where('register_id',$registerId)->with(['user'=>function($q){
                                                                $q->select('id','name');}])
            ->get();

        $marks=Mark::select('user_id','recite1','activity1','recite2','activity2')->where([ ['register_id',$registerId],['subject_id',$subjectId] ])->get();

        return view('admin.marks.show_students',compact('students','marks'));
    }




    public function store_recite1(Request $request){

        $countStd=count($request->users_id);
        if($countStd > 0){
            for($i=0 ; $i<$countStd ; $i++){

                $mark = Mark::where([
                    ['user_id',$request->users_id[$i]],
                    ['register_id',$request->register_id],
                    ['subject_id',$request->subject_id]
                ])->first();

                if(!isset($mark)){
                    //echo 'not found'.$request->student_id[$i];
                    if (isset($request->degrees[$i])) {
                        Mark::create([
                            'user_id' => $request->users_id[$i],
                            'register_id' => $request->register_id,
                            'subject_id' => $request->subject_id,
                            'recite1' => $request->degrees[$i],
                        ]);
                    }
                }else{
                    //echo ' found'.$request->student_id[$i];
                    if (isset($request->degrees[$i])){
                        $mark->update([
                            'recite1'=>$request->degrees[$i],
                        ]);
                    }
                }


            }
            return 'done';
        }
    }

    public function store_activity1(Request $request){

        $countStd=count($request->users_id);
        if($countStd > 0){
            for($i=0 ; $i<$countStd ; $i++){

                $mark = Mark::where([
                    ['user_id',$request->users_id[$i]],
                    ['register_id',$request->register_id],
                    ['subject_id',$request->subject_id]
                ])->first();

                if(!isset($mark)){
                    //echo 'not found'.$request->student_id[$i];
                    if (isset($request->degrees[$i])) {
                        Mark::create([
                            'user_id' => $request->users_id[$i],
                            'register_id' => $request->register_id,
                            'subject_id' => $request->subject_id,
                            'activity1' => $request->degrees[$i],
                        ]);
                    }
                }else{
                    //echo ' found'.$request->student_id[$i];
                    if (isset($request->degrees[$i])){
                        $mark->update([
                            'activity1'=>$request->degrees[$i],
                        ]);
                    }
                }


            }
            return 'done';
        }
    }

    public function store_recite2(Request $request){

        $countStd=count($request->users_id);
        if($countStd > 0){
            for($i=0 ; $i<$countStd ; $i++){

                $mark = Mark::where([
                    ['user_id',$request->users_id[$i]],
                    ['register_id',$request->register_id],
                    ['subject_id',$request->subject_id]
                ])->first();

                if(!isset($mark)){
                    //echo 'not found'.$request->student_id[$i];
                    if (isset($request->degrees[$i])) {
                        Mark::create([
                            'user_id' => $request->users_id[$i],
                            'register_id' => $request->register_id,
                            'subject_id' => $request->subject_id,
                            'recite2' => $request->degrees[$i],
                        ]);
                    }
                }else{
                    //echo ' found'.$request->student_id[$i];
                    if (isset($request->degrees[$i])){
                        $mark->update([
                            'recite2'=>$request->degrees[$i],
                        ]);
                    }
                }
            }
            return 'done';
        }
    }

    public function store_activity2(Request $request){

        $countStd=count($request->users_id);
        if($countStd > 0){
            for($i=0 ; $i<$countStd ; $i++){

                $mark = Mark::where([
                    ['user_id',$request->users_id[$i]],
                    ['register_id',$request->register_id],
                    ['subject_id',$request->subject_id]
                ])->first();

                if(!isset($mark)){
                    //echo 'not found'.$request->student_id[$i];
                    if (isset($request->degrees[$i])) {
                        Mark::create([
                            'user_id' => $request->users_id[$i],
                            'register_id' => $request->register_id,
                            'subject_id' => $request->subject_id,
                            'activity2' => $request->degrees[$i],
                        ]);
                    }
                }else{
                    //echo ' found'.$request->student_id[$i];
                    if (isset($request->degrees[$i])){
                        $mark->update([
                            'activity2'=>$request->degrees[$i],
                        ]);
                    }
                }
            }
            return 'done';
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
