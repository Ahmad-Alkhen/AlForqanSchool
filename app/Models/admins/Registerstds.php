<?php

namespace App\Models\admins;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;


class Registerstds extends Model
{


    protected $table = 'registerstd';
    public $timestamps = false;

    protected $fillable = [
        'register_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
