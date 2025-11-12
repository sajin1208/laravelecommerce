<?php

namespace Database\Seeders;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Controllers\CustomerController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Usertableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'sajin',
                'email' => 'sajin@gmai.com',
                'password' => 'sajin123',
                'is_admin' => 0
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmai.com',
                'password' => 'admin123',
                'is_admin' => 1
            ],
        ];

        foreach($userData as $userss)
        {
          User::create([
            'name' => $userss['name'],
            'email' => $userss['email'],
            'password' => bcrypt($userss['password']),
            'is_admin' => $userss['is_admin'] ?? 0
          ]);  
        }
          
    }
}
