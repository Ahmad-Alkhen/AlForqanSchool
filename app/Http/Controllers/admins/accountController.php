<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\accountRequest;
use App\Http\Requests\adminRequest;
use App\Models\admins\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class accountController extends Controller
{


    public function edit(){

        return view('admin.account.password');
    }

    public function update(accountRequest $request){
        try {
            $adminId =Auth::id();
            $admin =Admin::find($adminId);

                $admin->update([
                    'password'=>bcrypt($request->passwordNew),

                ]);

                toast('تم العديل بنجاح','success');
                return redirect()->route('admin.dash')->with(['success'=>'تم العديل بنجاح']);

        }catch (\Exception $exception){
            toast('حصل خطأ يرجى المحاولة لاحقاً ','error');
            return redirect()->route('admin.dash');

            // return $exception;
        }
    }


}
