<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_user')->insert([
            'name'     => 'admin',
            'username' => 'aku',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'bio'      => 'lorem',
            'profil_picture' => 'profile.jpg',
            'title' => 'bos',

        ]);
    }
}
