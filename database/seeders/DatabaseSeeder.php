<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ticket;
use App\Models\Message;
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
            'username' => 'luthfi',
            'email' => 'luthfiramadhan.lr55@gmail.com',
            'email_verified_at' => null,
            'password' => bcrypt('password'),
            'address' => 'Jl. Madesa Rt.005 Rw.011 Blok.K No.21 Kel.Kopo Kec.Bojongloa Kaler 40233 Bandung, Jawa barat',
            'phone_number' => '085722584409',
            'role' => 'admin',
            'remember_token' => null,
        ]);

        \App\Models\User::create([
            'name' => 'Izuchii',
            'username' => 'izuchii',
            'email' => 'izuchii@gmail.com',
            'email_verified_at' => null,
            'password' => bcrypt('password'),
            'address' => 'Jl. Madesa Rt.005 Rw.011 Blok.K No.21 Kel.Kopo Kec.Bojongloa Kaler 40233 Bandung, Jawa barat',
            'phone_number' => '085722584409',
            'role' => 'cashier',
            'remember_token' => null,
        ]);


        // ? Seeder ke Table Ticket
        Ticket::create([
            'user_id' => '1',
            'cd_ticket' => 'KD-001',
            'name_ticket' => 'Kawasan Gunung Burangrang',
            'price' => '20000',
            'description' => 'Tiket Menuju kawasan Gunung Burangrang'
        ]);

        Ticket::create([
            'user_id' => '1',
            'cd_ticket' => 'KD-002',
            'name_ticket' => 'Rumah Gunung',
            'price' => '75000',
            'description' => 'Tiket Fasilitas Penyewaan Rumah Gunung'
        ]);

        Ticket::create([
            'user_id' => '1',
            'cd_ticket' => 'KD-003',
            'name_ticket' => 'Curug Cipalasari',
            'price' => '10000',
            'description' => 'Tiket Menuju Kawasan Curug Cipalasari'
        ]);


        // ? Factory Transaction
        \App\Models\Transaction::factory(50)->create();


        // ? Seeder ke Table Messages
        Message::create([
            "name" => "Izuchii",
            "email" => "izuchii@gmail.com",
            "title" => "Wisata Curug Cipalasari",
            "slug" => "wisata-curug-cipalasari",
            "message" => "Curugnya Indah, apalagi jika musim hujan cuacanya sangat dingin menyenangkan dan air curug pun sangat besar dan memukau. Terkadang juga ada pelangi yang tercipta dari air curug tersebut.🤣🌟",
            "recomend" => null
        ]);

        Message::create([
            "name" => "Hutao",
            "email" => "hutao@liyue.com",
            "title" => "Warganya ramah",
            "slug" => "warganya-ramah",
            "message" => "Pertama kali kesana, tiba tiba pas pasan sama warga dan ramah saling sapa, saling bantu. Asik banget disiniiii........",
            "recomend" => null
        ]);

        Message::create([
            "name" => "HuoHuo",
            "email" => "huo_alchemy@yahoo.com",
            "title" => "Huo Suka Suasana Malam",
            "slug" => "huo-suka-suasana-malam",
            "message" => "Huo merasa suasana malam di kawasan burangrang sangat menyenangkan, gelap, dingin, dan adanya suara suara yang mengerikan.",
            "recomend" => null
        ]);

        Message::create([
            "name" => "March 7th",
            "email" => "march7th@starrail.pom",
            "title" => "March Photography",
            "slug" => "march-photography",
            "message" => "Disana aku sedang memotret pemandangan, tiba tiba ada seekor anjing dan aku foto dia. Eh... ga lama tiba tiba dia marah dan ngejar aku... 😭😭",
            "recomend" => null
        ]);

        Message::create([
            "name" => "Luthfi Nur Ramadhan",
            "email" => "luthfiramadhan.lr55@gmail.com",
            "title" => "Pemandangan Kawasan Gunung Burangrang",
            "slug" => "pemandangan-kawasan-gunung-burangrang",
            "message" => "Pemandangannya indah, dapat melihat pesona terbitnya matahari di pagi hari, sejuk, menyenangkan. Ada juga air terjun nan indah dan cantik.",
            "recomend" => null
        ]);

        \App\Models\Message::factory(100)->create();
    }
}
