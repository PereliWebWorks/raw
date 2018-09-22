<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$default_role = new App\Role;
    	$default_role->name = 'manager';
    	$default_role->save();

    	$admin_role = new App\Role;
    	$admin_role->name = 'admin';
    	$admin_role->save();
    }
}
