<?php

namespace App\Models\admins;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;



class Message extends Model
{


    public $timestamps = false;

    protected $fillable = [
        'sender',
        'user_id',
        'subject',
        'message',
        'date',
    ];
public function user(){
    return $this->belongsTo(User::Class,'user_id');
}

}
