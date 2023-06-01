<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->insert([
      [
        'username' => 'admin',
        'role' => 'admin',
        'password' => Hash::make('admin123'),
      ],
      [
        'username' => 'user',
        'role' => 'user',
        'password' => Hash::make('user123'),
      ],
    ]);
  }
}
