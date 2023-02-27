<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = 'Administrador';
        $role->save();

        $user = new User;
        $user->role_id = $role->id;
        $user->name = 'Dev';
        $user->surname = '';
        $user->email = 'alexismaganda32@gmail.com';
        $user->password = 'developer';
        $user->email_verified_at = date('Y-m-d H:m:i');
        $user->save();
    }
}
