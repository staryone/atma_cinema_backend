<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::insert([
            [
                'reviewID' => 'REV00001',
                'userID' => 'USREFFJM',
                'movieID' => 'MOVATA8E',
                'comment' => 'Amazing movie, great concept!',
                'rating' => 5,
                'reviewDate' => '2024-11-25 03:00:00',
            ],
            [
                'reviewID' => 'REV00002',
                'userID' => 'USREFFJM',
                'movieID' => 'MOVATA8E',
                'comment' => 'Mind-blowing and unique.',
                'rating' => 4,
                'reviewDate' => '2024-11-26 05:30:00',
            ],
            [
                'reviewID' => 'REV00003',
                'userID' => 'USREFFJM',
                'movieID' => 'MOVMLEQR',
                'comment' => 'Best Batman movie ever!',
                'rating' => 5,
                'reviewDate' => '2024-11-25 08:45:00',
            ],
            [
                'reviewID' => 'REV00004',
                'userID' => 'USREFFJM',
                'movieID' => 'MOVUXAVZ',
                'comment' => 'Beautifully made and emotional.',
                'rating' => 5,
                'reviewDate' => '2024-11-24 13:15:00',
            ],
            [
                'reviewID' => 'REV00005',
                'userID' => 'USREFFJM',
                'movieID' => 'MOVWXHER',
                'comment' => 'A great conclusion to the saga.',
                'rating' => 4,
                'reviewDate' => '2024-11-23 11:00:00',
            ],
            [
                'reviewID' => 'REV00006',
                'userID' => 'USREFFJM',
                'movieID' => 'MOVXKMHM',
                'comment' => 'Classic and revolutionary!',
                'rating' => 5,
                'reviewDate' => '2024-11-22 12:00:00',
            ],
        ]);
    }
}
