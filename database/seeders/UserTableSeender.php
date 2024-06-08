<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserTableSeender extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'test@example.com',
            'password' => '1234',
        ]);
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => '1235',
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => '1236',
        ]);
        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@example.com',
            'password' => '1237',
        ]);
        DB::table('users')->insert([
            'name' => 'user4',
            'email' => 'user4@example.com',
            'password' => '1238',
        ]);
        DB::table('users')->insert([
            'name' => 'user5',
            'email' => 'user5@example.com',
            'password' => '1239',
        ]);
        DB::table('users')->insert([
            'name' => 'user6',
            'email' => 'user6@exanple.com',
            'password' => '12310',
        ]);
        DB::table('users')->insert([
            'name' => 'user7',
            'email' => 'user7@example.com',
            'password' => '12311',
        ]);
        DB::table('users')->insert([
            'name' => 'user8',
            'email' => 'user8@example.com',
            'password' => '12312',
        ]);
        DB::table('users')->insert([
            'name' => 'user9',
            'email' => 'user9@example.com',
            'password' => '12313',
        ]);
        DB::table('users')->insert([
            'name' => 'user10',
            'email' => 'user10@example.com',
            'password' => '12314',
        ]);
    }
}
