<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for ($i = 1; $i <= 800; $i++) {
            $users = ([
                'username'    => '2100' . $i,
                'password'    => Str::random(3).'00'.$i
            ]);
            User::create($users);
        }
    }
}
