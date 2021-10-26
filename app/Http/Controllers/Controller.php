<?php

namespace App\Http\Controllers;

use App\Models\admins\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        try {
            DB::connection()->getPdo();
        if(DB::connection()->getDatabaseName()) {
            $notifications = Notification::where('state','1')->orderBy('id','DESC')->paginate(4);
            View::share('notifications', $notifications);
        }

        }catch (\Exception $exception){
            die("Could not open connection to database server.  Please check your configuration.");
        }
    }

}
