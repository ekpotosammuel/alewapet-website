<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = [
            [
                "user_id" => 1, // Admin
                "role_id" => 1 // adminstrator
            ],

            [
                "user_id" => 2, // fumigation
                "role_id" => 3 // fumigation role
            ],


        ];

        foreach ($user_roles as $key => $value) {
            # code...
            $user_id = $value['user_id'];
            $role_id = $value['role_id'];

            $already_exist = UserRole::where([['user_id', $user_id], ['role_id', $role_id]])->first();
            if($already_exist == null){
                $user_role = new UserRole();
                $user_role->user_id = $user_id;
                $user_role->role_id = $role_id;
                $user_role->save();
            }
        }
    }
}
