<?php

namespace App\Models\admins;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class Point extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'register_id',
        'admin_id',
        'points',
        'info',
        'date',
    ];


    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function register(){
        return $this->belongsTo(Register::class,'register_id');
    }

}
