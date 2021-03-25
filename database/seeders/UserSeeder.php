<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'antoni',
            'email' => 'antoni@gmail.com',
            'password' => bcrypt('antoni123'),
            'alamat' => 'komp. griya ulin permai, jl. murai no. m15',
            'nomorhp' => '087865226782',
            'hak_akses' => 'administrator'
        ]);
    }
}
