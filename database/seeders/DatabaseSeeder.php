<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Studio;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(StudiosSeeder::class);
        $this->call(MoviesSeeder::class);
        $this->call(ScreeningsSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(HistoriesSeeder::class);
        $this->call(ReviewsSeeder::class);
    }
}
