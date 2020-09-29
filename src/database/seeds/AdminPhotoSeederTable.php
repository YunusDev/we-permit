<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminPhotoSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding two users inside the database including their profile pic

        \DB::table('admins')->delete();


        DB::table('admins')->insert([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'status' => 1,
            'phone' => 7084940333,
            'remember_token' => str_random(10),
            'password' => bcrypt('john123'),
            'created_at' => Carbon::parse(now())->format('Y.m.d'),
        ]);


        DB::table('admins')->insert([
            'name' => 'Desmond Ava',
            'email' => 'ava@gmail.com',
            'status' => 1,
            'phone' => 90345678,
            'password' => bcrypt('ava123'),
            'remember_token' => str_random(10),
            'created_at' => Carbon::parse(now())->format('Y.m.d'),
        ]);


    }
}
