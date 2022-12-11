<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $users = [
            ['id' => 1, 'name' => 'Manager', 'email' => 'manager@gmail.com', 'email_verified_at' => now(), 'password' => '12345678', 'remember_token' => Str::random(10), 'role' => 'manager']
        ];

        foreach ($users as $user) {
            if (!User::query()->where('email', '=', $user['email'])->exists()) {

                $userCreate = new User();

                $userCreate['id'] = $user['id'];
                $userCreate['name'] = $user['name'];
                $userCreate['email'] = $user['email'];
                $userCreate['email_verified_at'] = $user['email_verified_at'];
                $userCreate['password'] = bcrypt($user['password']);
                $userCreate['remember_token'] = $user['remember_token'];
                $userCreate->save();

                $userCreate->assignRole($user['role']);
            }
        }
    }
}
