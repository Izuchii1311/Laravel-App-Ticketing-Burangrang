<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        \App\Models\User::create([
            'name' => 'Luthfi Nur Ramadhan',
            'username' => 'izuchii',
            'email' => 'luthfiramadhan.lr55@gmail.com',
            'email_verified_at' => null,
            'password' => bcrypt('password'),
            'address' => 'Jl. Madesa Rt.005 Rw.011 Blok.K No.21 Kel.Kopo Kec.Bojongloa Kaler 40233 Bandung, Jawa barat',
            'phone_number' => '085722584409',
            'role' => 'admin',
            'remember_token' => null,
        ]);

        Ticket::create([
            'cd_ticket' => 'KD-001',
            'price' => '20000',
            // Ticket {id, cd_ticket, price, start_time, end_time, status}
        ]);

        Ticket::create([
            'cd_ticket' => 'KD-002',
            'price' => '15000',
            // Ticket {id, cd_ticket, price, start_time, end_time, status}
        ]);
    }
}
