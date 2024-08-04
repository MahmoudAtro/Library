<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use  App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = \App\Models\User::factory()->create([

            'name' => 'Mahmoud Atro',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456),
            'country' => 'syria',
            'address' => 'Sarmada - Idlib St-4',
            'create_date' => Carbon::now()

        ]);


        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        // create Permission
        $addBook   = Permission::create(['name' => 'add book']);
        $addUser = Permission::create(['name' => 'add user']);
        $showBook = Permission::create(['name'=>'show book']);
        $showUser  = Permission::create(['name'=>'show user']);


        $roleAdmin->givePermissionTo([$addBook , $addUser , $showBook , $showUser]);
        $roleUser->givePermissionTo($showBook);

        $user->assignRole('admin');
        
           

    }
}
