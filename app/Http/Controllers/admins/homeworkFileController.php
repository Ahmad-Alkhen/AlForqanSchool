<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\homeworkFilesRequest;

use App\Models\admins\Homeworks_files;
use App\Models\admins\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class homeworkFileController extends Controller
{
    public function index(){

        if (Auth::user()->permission =='1'){
            $homeworks=Homeworks_files::with(['register'=>function($q){
                $q->select('id','name');}])->
            with(['admin'=>function($q){
                $q->select('id','name');}])
                ->get();
        }else{
            $homeworks=Homeworks_files::with(['register'=>function($q){
                $q->select('id','name');}])
                ->where('admin_id',Auth::id())
                ->get();
        }
        return view('admin.homeworksFiles.index',compact('homeworks'));
    }

    public function import(){
        if (Auth::user()->permission =='1'){
            $registers= Register::where('active','1')-> get();

        }else{
            $registers= Register::where('admin_id',Auth::id())->where('active','1')-> get();
        }

        return view('admin.homeworksFiles.import',compact('registers'));
    }

    public function upload(homeworkFilesRequest $request){
        try {
            //$path = Storage::put('homeworks', $request->file('file'));
            $orginalNmae = $request->file('file')->getClientOriginalName();
            $neworginalNmae = substr($orginalNmae, 0 , (strrpos($orginalNmae, ".")));

            $name = strtotime(now()).'_'.$request->file('file')->getClientOriginalName();
            $path = Storage::putFileAs('homeworks', $request->file('file'), $name);

            Homeworks_files::create([
                'register_id'=>$request->register_id,
                'admin_id'=>Auth::id(),
                'name'=>$neworginalNmae,
                'file'=> $path,
                'date'=>now(),
            ]);


            toast('تمت الإضافة بنجاح','success');
           return redirect()->route('admin.homeworksFile.index')->with(['success'=>'تمت الإضافة بنجاح']);
           // return $neworginalNmae;
        }catch (\Exception $exception){
         //   return $exception ;
             toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
            return redirect()->route('admin.homeworksFile.index');

        }
    }

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
            return redirect()->route('admin.homeworksFile.index');
        }

    }

    public function delete(Request $request){
        $homeworkId=  $request->id;
        $homework =Homeworks_files::find($homeworkId) ;

        if($homework){
            $path = Storage::delete($homework->file);
            $homework->delete();
        }
        return 'done' ;
    }

}
