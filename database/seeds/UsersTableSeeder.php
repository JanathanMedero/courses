<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
    	//Roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        Role::create(['name' => 'Moderator']);

        //Permissions
        Permission::create(['name' => 'index users']);
        Permission::create(['name' => 'show user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'suspend user']);

        Permission::create(['name' => 'index moderators']);
        Permission::create(['name' => 'show moderator']);
        Permission::create(['name' => 'edit moderator']);

        Permission::create(['name' => 'index courses']);
        Permission::create(['name' => 'show course']);
        Permission::create(['name' => 'edit course']);
        Permission::create(['name' => 'suspend course']);
        Permission::create(['name' => 'destroy course']);

        $admin = User::create([
	        	'name' => 'Janathan Medero',
                'image' => 'default.png',
	        	'slug' => 'janathan-medero',
	        	'email' => 'medero.janathan@gmail.com',
	        	'password' => Hash::make('password')
	        ]);
        $admin->givePermissionTo([
        	'index users',
        	'show user',
        	'edit user',
        	'suspend user',
        	'index moderators',
        	'show moderator',
        	'edit moderator',
        	'index courses',
        	'show course',
        	'edit course',
        	'destroy course'
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
	        	'name' => 'John Doe',
                'image' => 'default.png',
	        	'slug' => 'john-doe',
	        	'email' => 'john.doe@gmail.com',
	        	'password' => Hash::make('password')
	        ]);
        $user->givePermissionTo([
        	'index courses',
        	'show course',
        	'edit course',
        	'destroy course'
        ]);

        $user->assignRole('User');

        $moderator = User::create([
	        	'name' => 'Gina Doe',
                'image' => 'default.png',
	        	'slug' => 'gina-doe',
	        	'email' => 'gina.doe@gmail.com',
	        	'password' => Hash::make('password')
	        ]);
        $moderator->givePermissionTo([
        	'index users',
        	'show user',
        	'suspend user',
        	'index courses',
        	'show course',
        	'suspend course'
        ]);

        $moderator->assignRole('Moderator');

        factory(User::class)->times(50)->create();
    }
}
