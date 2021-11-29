<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ];

        if (!User::where('email', $adminUser['email'])->exists()) {
            User::create($adminUser);
        }
    }
}
