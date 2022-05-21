<?php

namespace App\Imports;

use Hash;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nidn' => $row['nidn'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']), // encrypt
            'roles' => 'teacher',
        ]);
    }
}
