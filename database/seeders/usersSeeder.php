<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Elie',
            'email' => 'eliesakr@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone_number' => '81936432'
        ]);
        DB::table('users')->insert([
            'name' => 'Nada',
            'email' => 'nada@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone_number' => '70121314'
        ]);
        DB::table('users')->insert([
            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone_number' => '71213141'
        ]);
    }
}
