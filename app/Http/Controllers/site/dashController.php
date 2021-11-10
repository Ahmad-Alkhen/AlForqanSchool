<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\messageRequest;
use App\Models\admins\Homework;
use App\Models\admins\Homeworks_files;
use App\Models\admins\Mark;
use App\Models\admins\Message;
use App\Models\admins\Note;
use App\Models\admins\Point;
use App\Models\admins\Registerstds;
use App\Models\admins\Subject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class dashController extends Controller
{
    public function index(){

    $age = Carbon::parse(Auth::user()->birthday)->age ;

    $pointPos=0;
    $pointNeg=0;
    $lastRegister=Registerstds::where('user_id',Auth::id())->orderby('id','DESC')->first();

    if (isset($lastRegister)){
        $pos_points= Point::select('points')->where([['user_id',Auth::id()],['register_id',$lastRegister->register_id],['points','>','0']])->get();
        $neg_points= Point::select('points')->where([['user_id',Auth::id()],['register_id',$lastRegister->register_id],['points','<','0']])->get();

        if (isset($pos_points)){
                foreach($pos_points as $pos_point){
                  $pointPos += $pos_point->points;
                }
        }
        if (isset($neg_points)) {
            foreach ($neg_points as $neg_point) {
                $pointNeg += $neg_point->points;
            }
        }

        $notes=Note::where([['user_id',Auth::id()],['active','1']])->orderby('id','DESC')->get();

        $homeworks=Homework::where('register_id',$lastRegister->register_id)->orderby('id','DESC')->paginate(5);
        $homeworks_files=Homeworks_files::where('register_id',$lastRegister->register_id)->orderby('id','DESC')->paginate(3);

        $marks=Mark::where([['user_id',Auth::id()],['register_id',$lastRegister->register_id]])->with('subject')->get();

        return view('site.dash',compact('age','pointPos','pointNeg','notes','homeworks','homeworks_files','marks'));
        }
    return "يرجى  مراجعة الإدارة للتأكد من أنك مضاف إلى صف معين";



    }

    // Send Message to Admin
    public function store(messageRequest $request){
        try {
            Message::create([
                'sender'=>$request->sender,
                'user_id'=>Auth::id(),
                'subject'=>$request->subject,
                'message'=>$request->message,
                'date'=>now(),
            ]);

                toast('تم إرسال الرسالة بنجاح ! شكراً لكم','success');
         return redirect()->route('site.dash');


            // return 'تم إرسال الرسالة بنجاح ! شكراً لكم ';

        }catch (\Exception $exception){
           //  return $exception ;
            toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }

}

    // Download File from Homeworks files
    public function download($homeworkId){
        try {
            $homework =Homeworks_files::find($homeworkId) ;

            if($homework){
                $filepath = storage_path('app/'.$homework->file);
                //  return $filepath;
                return \Response::download($filepath);
            }
        }catch (\Exception $exception){
            //return $exception ;
            toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
            return redirect()->back();
        }

    }

}
