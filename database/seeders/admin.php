<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $user = User::create([
        'email' => 'fandemo@gmail.com',
        'user_role' => 'admin',
        'has_profile' => '1',
        'password' => Hash::make('sayaweh12'),
      ]);
    }
}
