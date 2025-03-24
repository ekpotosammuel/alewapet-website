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
            [
                'name' => "System Adminstrator",
                'email' => "admin@alawapet.com",
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Ekpoto Samuel",
                'email' => "ekpotosammuel1@gmail.com",
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ]
        ];

        foreach ($users as $key => $value) {
            $already_exist = User::where("email", $value['email'])->first();
            if($already_exist == null){
                $user = new User();
                $user->name = $value['name'];
                $user->email = $value['email'];
                $user->email_verified_at = $value['email_verified_at'];
                $user->password = $value['password'];
                $user->remember_token = $value['remember_token'];
                $user->save();
            }
        }
    }
}
