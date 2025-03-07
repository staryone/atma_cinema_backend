<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        History::insert([
            [
                'historyID' => 'HIS00001',
                'userID' => 'USREFFJM',
                'paymentID' => 'PAY00001',
            ],
            [
                'historyID' => 'HIS00002',
                'userID' => 'USREFFJM',
                'paymentID' => 'PAY00002',
            ],
            [
                'historyID' => 'HIS00003',
                'userID' => 'USREFFJM',
                'paymentID' => 'PAY00003',
            ],
            [
                'historyID' => 'HIS00004',
                'userID' => 'USREFFJM',
                'paymentID' => 'PAY00004',
            ],
            [
                'historyID' => 'HIS00005',
                'userID' => 'USREFFJM',
                'paymentID' => 'PAY00005',
            ],
            [
                'historyID' => 'HIS00006',
                'userID' => 'USREFFJM',
                'paymentID' => 'PAY00006',
            ],
        ]);
    }
}
