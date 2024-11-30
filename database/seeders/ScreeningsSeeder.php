<?php

namespace Database\Seeders;

use App\Models\Screening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreeningsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Screening::insert([
            [
                'screeningID' => 'SCR00001',
                'movieID' => 'MOVATA8E',
                'studioID' => 'STU00001',
                'seatLayout' => '{"A1": "available", "A2": "available"}',
                'date' => '2024-12-01',
                'time' => '18:00:00',
                'price' => 10.50,
            ],
            [
                'screeningID' => 'SCR00002',
                'movieID' => 'MOVMLEQR',
                'studioID' => 'STU00001',
                'seatLayout' => '{"A1": "available", "A2": "booked"}',
                'date' => '2024-11-29',
                'time' => '20:00:00',
                'price' => 12.00,
            ],
            [
                'screeningID' => 'SCR00003',
                'movieID' => 'MOVUXAVZ',
                'studioID' => 'STU00002',
                'seatLayout' => '{"A1": "booked", "A2": "available"}',
                'date' => '2024-12-03',
                'time' => '21:00:00',
                'price' => 11.00,
            ],
            [
                'screeningID' => 'SCR00004',
                'movieID' => 'MOVWXHER',
                'studioID' => 'STU00002',
                'seatLayout' => '{"A1": "available", "A2": "available"}',
                'date' => '2024-12-01',
                'time' => '19:30:00',
                'price' => 13.00,
            ],
            [
                'screeningID' => 'SCR00005',
                'movieID' => 'MOVXKMHM',
                'studioID' => 'STU00003',
                'seatLayout' => '{"A1": "available", "A2": "available"}',
                'date' => '2024-11-29',
                'time' => '22:00:00',
                'price' => 15.00,
            ],
        ]);
    }
}
