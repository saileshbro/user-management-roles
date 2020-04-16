<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name'=>Role::$ADMIN]);
        Role::create(['name'=>Role::$AUTHOR]);
        Role::create(['name'=>Role::$USER]);

    }
}
