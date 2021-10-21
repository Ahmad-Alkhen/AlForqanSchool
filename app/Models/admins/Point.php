<?php

namespace App\Models\admins;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Builder\Class_;

class Point extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'register_id',
        'admin_id',
        'points',
        'info',
        'date',
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function register(){
        return $this->belongsTo(Register::class,'register_id');
    }

}
