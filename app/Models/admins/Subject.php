<?php

namespace App\Models\admins;
use Illuminate\Database\Eloquent\Model;



class Subject extends Model
{


    public $timestamps = false;

    protected $fillable = [
        'name',
    ];


}
