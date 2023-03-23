<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    public function run()
    {
        $user = [
            [
               'name'=>'Laxmi',
               'email'=>'laxmi@gmail.com',
                'role'=>'admin',
               'password'=> bcrypt('laxmi@5'),
            ],
            [
               'name'=>'Lavanya',
               'email'=>'lavanya@gmail.com',
                'role'=>'admin',
               'password'=> bcrypt('lavanya@5'),
            ],
            [
               'name'=>'Lalitha',
               'email'=>'lalitha@gmail.com',
                'role'=>'admin',
               'password'=> bcrypt('lalitha@5'),
            ],
            [
               'name'=>'Venkata',
               'email'=>'venkata@gmail.com',
                'role'=>'user',
               'password'=> bcrypt('venkata@5'),
            ],
            [
               'name'=>'Lahari',
               'email'=>'lahari@gmail.com',
                'role'=>'nonadmin',
               'password'=> bcrypt('lahari@5'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}