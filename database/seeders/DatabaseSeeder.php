<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        User::create([
            'name' => 'Sayed Zaid',
            'phone' => '8433885667',
            'email' => 'szaid444666@gmail.com',
            'password' => Hash::make('Admin@123'),
            'role' => 'admin',
            'status' => 1,
            'deleteId' => 0,
        ]);
    }
}
