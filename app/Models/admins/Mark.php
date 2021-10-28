<?php

namespace App\Models\admins;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;


class Mark extends Model
{

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

    public function subject(){
        return $this->belongsTo(Subject::Class,'subject_id');
    }

}
