<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'      => 'Abdul Salam',
                'email'     => 'admin@gmail.com',
                'password'  => Hash::make('password'),
                'roles'     => 'admin'
            ],
            [
                'name'      => 'Ayane',
                'email'     => 'ayane@gmail.com',
                'password'  => Hash::make('password'),
                'roles'     => 'admin'
            ],
            [
                'name'      => 'Chika Fujiwara',
                'email'     => 'chika@gmail.com',
                'password'  => Hash::make('password'),
                'roles'     => 'student'
            ],
            [
                'name'      => 'Kotone',
                'email'     => 'kotone@gmail.com',
                'password'  => Hash::make('password'),
                'roles'     => 'teacher'
            ],
        ]);
    }
}
