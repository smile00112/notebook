<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUser = new Permission();
        $manageUser->name = 'Manage email';
        $manageUser->slug = 'manage-email';
        $manageUser->save();

        $createTasks = new Permission();
        $createTasks->name = 'Create Tasks';
        $createTasks->slug = 'create-tasks';
        $createTasks->save();

        $createTasks = new Permission();
        $createTasks->name = 'Create Users';
        $createTasks->slug = 'create-users';
        $createTasks->save();

        $createTasks = new Permission();
        $createTasks->name = 'Manage Users';
        $createTasks->slug = 'manage-users';
        $createTasks->save();        
    }
}
