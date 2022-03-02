<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat Sample Role
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Administrator";
        $adminRole->save();

        $authorRole = new Role();
        $authorRole->name = "author";
        $authorRole->display_name = "Author";
        $authorRole->save();

        // Membuat Sample User
        $admin = new User();
        $admin->name = 'Admin Penentuan Wisata';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('admin12345');
        $admin->save();
        $admin->attachRole($adminRole);

    }
}
