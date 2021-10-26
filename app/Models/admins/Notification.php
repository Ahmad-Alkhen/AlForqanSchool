<?php

namespace App\Models\admins;
use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'admin_id',
        'event',
        'state',
        'date',
    ];

    public function admin(){
        return $this->belongsTo(Admin::Class,'admin_id');
    }

}
