<?php

namespace Database\Seeders;

use App\Models\Studio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Studio::insert([
            [
                'studioID' => 'STU00001',
                'name' => 'Reguler 2D',
                'capacity' => 60,
            ],
            [
                'studioID' => 'STU00002',
                'name' => 'Reguler 3D',
                'capacity' => 60,
            ],
            [
                'studioID' => 'STU00003',
                'name' => 'Premier 2D',
                'capacity' => 30,
            ],
            [
                'studioID' => 'STU00004',
                'name' => 'Premier 3D',
                'capacity' => 30,
            ],
        ]);
    }
}
