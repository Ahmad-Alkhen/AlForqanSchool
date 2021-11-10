<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithUpserts;


class usersImport implements ToCollection,withHeadingRow
{

  /* public function model(array $row)
    {
        return new User([
            'name'=>$row['name'],
            'user_name'=>$row['user_name'],
            'password'=>bcrypt($row['password']),
            'phone'=>$row['phone'],
            'address'=>$row['address'],
            //'birthday'=>$row['birthday'],
            'birthday'=>  Carbon::createFromFormat('d/m/Y', $row['birthday'])->format('Y-m-d'),
        ]);


    }*/


    public function collection(Collection $rows)
    {

        foreach ($rows as $row)
        {
                User::updateOrCreate(
                    [
                        'user_name'=>$row['user_name'],
                    ],
                    [
                    'name'=>$row['name'],
                    'password'=>bcrypt($row['password']),
                    'phone'=>$row['phone'],
                    'address'=>$row['address'],
                    'birthday'=> $row['birthday'],
                    'active'=> $row['active'],
                   //  'birthday'=>  Carbon::createFromFormat('d/m/Y', $row['birthday'])->format('Y-m-d'),
                    ]
               );
        }
    }

}
