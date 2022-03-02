<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'username' => "admin",
                'role' => "admin",
                'email' => "admin@test.com",
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(60),
            ),
            array(
                'username' => "author",
                'role' => "author",
                'email' => "author@test.com",
                'password' => Hash::make('author'),
                'remember_token' => Str::random(60),
            ),
        );
        DB::table('users')->insert($data);
    }
}
