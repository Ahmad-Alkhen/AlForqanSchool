<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\pointRequest;
use App\Http\Requests\registerRequest;
use App\Http\Requests\subjectRequest;
use App\Models\admins\Admin;
use App\Models\admins\Mark;
use App\Models\admins\Notification;
use App\Models\admins\Point;
use App\Models\admins\Register;
use App\Models\admins\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class subjectController extends Controller
{

    public function index(){

        $subjects=Subject::get();
        return view('admin.subjects.index',compact('subjects'));
    }

    public function store(subjectRequest $request){

        try {
               Subject::create([
                   'name'=>$request->subject,
               ]);
                toast('تمت الإضافة بنجاح','success');

            if (Auth::user()->permission !='1') {
                Notification::create([
                    'admin_id' => Auth::id(),
                    'event' => ' تم إضافة المادة ' . $request->subject . ' من قبل المشرف  ' . Auth::user()->name,
                    'date' => now(),
                ]);
            }

            return redirect()->route('admin.subject.index');

        }catch (\Exception $exception){
     //   return $exception ;
         toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
         return redirect()->route('admin.subject.index');
        }
    }

    public function delete(Request $request){
        $subjectId=  $request->id;
        $subject =Subject::find($subjectId) ;

        if($subject){
            $subject->delete();
            Mark::where('subject_id',$subject->id)->delete();


            if (Auth::user()->permission !='1') {
                Notification::create([
                    'admin_id' => Auth::id(),
                    'event' => ' تم حذف المادة ' . $subject->name . ' من قبل المشرف  ' . Auth::user()->name,
                    'date' => now(),
                ]);
            }
        }
    }

}
