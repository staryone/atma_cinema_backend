<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'userID' => 'USREFFJM',
            'fullName' => 'Kurasi Red',
            'email' => 'kurasired@gmail.com',
            'password' => '$2y$12$zRkrIu1veFgc9iHr5yDCuOubsyqrwG47/gJDdGL.AVc3EvEASaHi6',
            'dateOfBirth' => '2024-11-30',
            'registrationDate' => '2024-11-30',
            'gender' => 'Male',
            'phoneNumber' => '+621818181818',
            'profilePicture' => 'profile_pictures/p9wMd0n3Ciyf2sTEJt3IO97Kq97665CVZ0POUXLs.jpg',
        ]);
    }
}
