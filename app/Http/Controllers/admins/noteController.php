<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\noteRequest;
use App\Models\admins\Admin;
use App\Models\admins\Note;
use App\Models\admins\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class noteController extends Controller
{

    public function index(){
        if (Auth::user()->permission =='1'){
            $notes= Note::with(['user'=>function($q){$q->select('id','name');},'admin'=>function($q){$q->select('id','name');}])-> get();

        }else
            $notes= Note::where('admin_id',Auth::id())->with(['user'=>function($q){$q->select('id','name');}])-> get();

        return view('admin.notes.index',compact('notes'));
    }

    public function create(){
        $users=User::where('active','1')->get();
        return view('admin.notes.create',compact('users'));
    }

    public function store(noteRequest $request){

        try {
               Note::create([
                   'user_id'=>$request->user_id,
                   'admin_id'=>Auth::id(),
                   'note'=>$request->note,
                   'date'=>now(),
               ]);
                toast('تمت الإضافة بنجاح','success');
              return redirect()->route('admin.note.index')->with(['success'=>'تمت الإضافة بنجاح']);

        }catch (\Exception $exception){

          toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }
    }

    public function edit($noteId){
        $note =Note::find($noteId);
        $users=User::where('active','1')->get();

        if(!$note)
            return redirect()->route('admin.note.index')->with(['error' =>'الملاحظة غير موجودة' ]);
        else
        return view('admin.notes.edit',compact('note','users'));
    }

    public function update(noteRequest $request,$noteId){
        try {

            $note =Note::find($noteId);
            if(!$note)
                return redirect()->route('admin.note.index');
            else{

                $note->update([
                    'user_id'=>$request->user_id,
                    'admin_id'=>Auth::id(),
                    'note'=>$request->note,
                    'date'=>now(),
                ]);
                  toast('تم التعديل بنجاح','success');
                return redirect()->route('admin.note.index')->with(['success'=>'تم التعديل بنجاح']);
            }
        }catch (\Exception $exception){
            toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
        }
    }


    public function delete($noteId){

        $note =Note::find($noteId) ;

        if(!$note){
            return redirect()->route('admin.note.index')->with(['error' =>'الملاحظة غير متوفرة' ]);
        }

        $note->delete();
             toast('تم الحذف بنجاح','success');
          return redirect()->route('admin.note.index')->with(['success' =>'تم الحذف بنجاح' ]);
    }


    public function active(Request $request){
        $note =Note::find($request->id);
        if(!$note)
            return redirect()->route('admin.note.index');
        else{
            if ($note->active=='0'){
                $note->update([
                    'active'=>'1',
                ]);
                return '1' ;
            }else{
                $note->update([
                    'active'=>'0',
                ]);
                return '0' ;
            }
        }


    }
}
