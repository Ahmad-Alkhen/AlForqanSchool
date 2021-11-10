<?php

namespace App\Models\admins;

use Illuminate\Database\Eloquent\Model;


class Homeworks_files extends Model
{

    protected $table='Homeworks_files';
    public $timestamps = false;

    protected $fillable = [
        'admin_id',
        'register_id',
        'name',
        'file',
        'date',
    ];


    public function register(){
        return $this->belongsTo(Register::class,'register_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }

}
