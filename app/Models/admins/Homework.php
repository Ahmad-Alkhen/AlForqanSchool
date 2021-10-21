<?php

namespace App\Models\admins;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Builder\Class_;

class Homework extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='homeworks';
    public $timestamps = false;

    protected $fillable = [
        'admin_id',
        'register_id',
        'info',
        'date',
    ];


    public function register(){
        return $this->belongsTo(Register::class,'register_id');
    }

}
