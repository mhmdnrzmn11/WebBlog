<?php

use Illuminate\Database\Seeder;
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
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
        ]);

        $teacher = User::create([
            'name' => 'Author',
            'email' => 'author@mail.com',
            'password' => bcrypt('author'),
        ]);

        $student = User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('author'),
        ]);

        $admin->assignRole('Administrator');
        $teacher->assignRole('Author');
        $student->assignRole('User');
    }
}
