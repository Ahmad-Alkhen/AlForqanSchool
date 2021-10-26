<?php

namespace App\Models\admins;

use Illuminate\Database\Eloquent\Model;


class Homework extends Model
{

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
