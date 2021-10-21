<?php

namespace App\Models\admins;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Builder\Class_;

class Mark extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'register_id',
        'subject_id',
        'user_id',
        'recite1',
        'activity1',
        'recite2',
        'activity2',
    ];

        public function user(){
            return $this->belongsTo(User::Class,'user_id');
        }

        public function register(){
            return $this->belongsTo(Register::Class,'register_id');
        }

}
