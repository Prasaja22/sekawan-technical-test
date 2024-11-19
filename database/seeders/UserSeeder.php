<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Admin user
         User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Gunakan password sesuai kebutuhan
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        // driver user
        User::create([
            'name' => 'Budiono siregar',
            'email' => 'budiono@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'driver',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Abel Herlambang',
            'email' => 'abel@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'driver',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Dony Wahyudi',
            'email' => 'doni@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'driver',
            'remember_token' => Str::random(10),
        ]);

        // Staff user
        User::create([
            'name' => 'Amin Rahman',
            'email' => 'rahman@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'staff',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Staff Penyetuju',
            'email' => 'staff@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'staff',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Driver Belum Ditentukan',
            'email' => 'driver@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'driver',
            'remember_token' => Str::random(10),
        ]);


        User::create([
            'name' => 'Mulyono',
            'email' => 'mulyono@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Gibran',
            'email' => 'gibran@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Jokosusila',
            'email' => 'joko@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'staff',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Agus Widodo',
            'email' => 'agus@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'staff',
            'remember_token' => Str::random(10),
        ]);
    }
}
