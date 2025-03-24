<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Adminstrator',
            'Secretary',
            'Fumigation'
        ];

        foreach ($roles as $key => $value) {
            $already_exist = Role::where('name', $value)->first();
            if($already_exist == null){
                $role = new Role();
                $role->name = $value;
                $role->save();
            }
        }
    }
}
