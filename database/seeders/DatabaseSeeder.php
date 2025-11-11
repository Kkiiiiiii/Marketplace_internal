<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',         // Pastikan memberikan nilai pada kolom 'name'
            'username' => 'Admin11',
            'password' => bcrypt('admin123'),
            'kontak' => '08734275626',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Member01',
            'username' => 'Member1',
            'password' => bcrypt('member123'),
            'kontak' => '08734275627',
            'role' => 'member'
        ]);
    }
}
