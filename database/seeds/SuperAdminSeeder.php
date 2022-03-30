<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@admin.com')->first();
        
        if (is_null($user)) {
            $user = new User;
            $user->name = 'Admin';
            $user->email = 'admin@admin.com';
            $user->password = bcrypt('admin');
            $user->save();
            $role = Role::findByName(config('permission.super_admin'));
            $user->assignRole($role);
        }
    }
}