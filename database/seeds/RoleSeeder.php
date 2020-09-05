<?php
use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = new Role();
        $manager->name = 'Administartor';
        $manager->slug = 'admin';
        $manager->save();

        $developer = new Role();
        $developer->name = 'Manager';
        $developer->slug = 'manager';
        $developer->save();
        
    }
}
