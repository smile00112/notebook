<?php
use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $manager = Role::where('slug', 'manager')->first();
        $createTasks = Permission::where('slug','create-tasks')->first();
        $createUsers = Permission::where('slug','create-users')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();

        $user1 = new User();
        $user1->name = 'admin';
        $user1->email = 'gorely.aleksei@yandex.ru';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($createTasks);
        $user1->permissions()->attach($createUsers);
        $user1->permissions()->attach($manageUsers);

        $user2 = new User();
        $user2->name = 'Manager';
        $user2->email = 'manager@manager.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($createUsers);
        $user2->permissions()->attach($manageUsers);
    }
}
