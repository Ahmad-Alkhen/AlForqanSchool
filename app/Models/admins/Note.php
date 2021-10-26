<?php

namespace App\Models\admins;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Note extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'admin_id',
        'user_id',
        'note',
        'date',
        'active',

    ];

    public function user(){
        return $this->belongsTo(User::Class,'user_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::Class,'admin_id');
    }

}
