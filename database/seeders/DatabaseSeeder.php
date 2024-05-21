<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'municipality' => 'Boac',
            'barangay' => ' Boac',
            'logo' => ' ',
            'current_term' => '1',
            'email' => 'aubrey@gmail.com',
            'password' => bcrypt('Aubrey123'), // Ensure the password is hashed
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);
    }
}
