<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;

use App\Models\admins\Notification;

use Illuminate\Support\Facades\Redirect;

class notificationController extends Controller
{

    public function asread(){
        $notifications = Notification::where('state','1')->get();
        foreach ($notifications as $notification) {
            $notification->update([
                'state' => '0',
            ]);
        }
        return \redirect()->back();

    }



}
