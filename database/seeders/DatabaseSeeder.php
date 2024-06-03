<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Term;
use App\Models\Author;

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
            'barangay' => ' ',
            'logo' => ' ',
            'current_term' => '1',
            'email' => 'adminBoac@gmail.com',
            'password' => bcrypt('Boac123'), // Ensure the password is hashed
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        User::factory()->create([
            'municipality' => 'Mogpog',
            'barangay' => ' ',
            'logo' => ' ',
            'current_term' => '1',
            'email' => 'adminMogpog@gmail.com',
            'password' => bcrypt('Mogpog123'), // Ensure the password is hashed
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        User::factory()->create([
            'municipality' => 'Sta.Cruz',
            'barangay' => ' ',
            'logo' => ' ',
            'current_term' => '1',
            'email' => 'adminSta.Cruz@gmail.com',
            'password' => bcrypt('StaCruz123'), // Ensure the password is hashed
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        User::factory()->create([
            'municipality' => 'Buenavista',
            'barangay' => ' ',
            'logo' => ' ',
            'current_term' => '1',
            'email' => 'adminBuenavista@gmail.com',
            'password' => bcrypt('Buenavista123'), // Ensure the password is hashed
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        User::factory()->create([
            'municipality' => 'Torrijos',
            'barangay' => ' ',
            'logo' => ' ',
            'current_term' => '1',
            'email' => 'adminTorrijos@gmail.com',
            'password' => bcrypt('Torrijos123'), // Ensure the password is hashed
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        User::factory()->create([
            'municipality' => 'Gasan',
            'barangay' => ' ',
            'logo' => ' ',
            'current_term' => '1',
            'email' => 'adminGasan@gmail.com',
            'password' => bcrypt('Gasan123'), // Ensure the password is hashed
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Author::factory()->create([
            'user_id' => '1',
            'name' => 'Aubrey M. Jabal',
            'position' => 'Sangguniang Bayan Secretary',
            'term_id' => '1',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Author::factory()->create([
            'user_id' => '2',
            'name' => 'Rylene Grace L. Sacro',
            'position' => 'Sangguniang Bayan Secretary',
            'term_id' => '1',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Author::factory()->create([
            'user_id' => '3',
            'name' => 'Ma. Christine Joy S. Frank',
            'position' => 'Sangguniang Bayan Secretary',
            'term_id' => '1',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Author::factory()->create([
            'user_id' => '4',
            'name' => 'Trixia G. Historillo',
            'position' => 'Sangguniang Bayan Secretary',
            'term_id' => '1',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Author::factory()->create([
            'user_id' => '5',
            'name' => 'Adrian O. Villaruel',
            'position' => 'Sangguniang Bayan Secretary',
            'term_id' => '1',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Author::factory()->create([
            'user_id' => '6',
            'name' => 'Reena Vea S. Mendoza',
            'position' => 'Sangguniang Bayan Secretary',
            'term_id' => '1',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Term::factory()->create([
            'user_id' => '1',
            'start' => '2023-10-30',
            'end' => '2025-10-30',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Term::factory()->create([
            'user_id' => '2',
            'start' => '2023-10-30',
            'end' => '2025-10-30',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Term::factory()->create([
            'user_id' => '3',
            'start' => '2023-10-30',
            'end' => '2025-10-30',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Term::factory()->create([
            'user_id' => '4',
            'start' => '2023-10-30',
            'end' => '2025-10-30',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Term::factory()->create([
            'user_id' => '5',
            'start' => '2023-10-30',
            'end' => '2025-10-30',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

        Term::factory()->create([
            'user_id' => '6',
            'start' => '2023-10-30',
            'end' => '2025-10-30',
            'created_at' => '2023-08-18 17:47:50',
            'updated_at' => '2023-08-18 17:47:50'
        ]);

    }
}
