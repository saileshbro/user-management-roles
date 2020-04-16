<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $adminRole = Role::where('name',Role::$ADMIN)->first();
        $authorRole = Role::where('name',Role::$AUTHOR)->first();
        $userRole = Role::where('name',Role::$USER)->first();

        DB::table('role_user')->truncate();
        $admin = User::create([
            'name'=>'Admin User',
            'email'=>'admin@admin.com',
            'password'=>Hash::make("password")
        ]);
        $author = User::create([
            'name'=>'Author User',
            'email'=>'author@author.com',
            'password'=>Hash::make("password")
        ]);
        $user = User::create([
            'name'=>'Generic User',
            'email'=>'user@user.com',
            'password'=>Hash::make("password")
        ]);
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
