<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::insert([
            [
                'paymentID' => 'PAY00001',
                'userID' => 'USREFFJM',
                'screeningID' => 'SCR00001',
                'paymentMethod' => 'Credit Card',
                'paymentStatus' => 'completed',
                'paymentDate' => '2024-12-01 03:00:00',
                'totalPayment' => 30.00,
            ],
            [
                'paymentID' => 'PAY00002',
                'userID' => 'USREFFJM',
                'screeningID' => 'SCR00002',
                'paymentMethod' => 'E-Wallet',
                'paymentStatus' => 'completed',
                'paymentDate' => '2024-11-29 07:25:22',
                'totalPayment' => 25.00,
            ],
            [
                'paymentID' => 'PAY00003',
                'userID' => 'USREFFJM',
                'screeningID' => 'SCR00003',
                'paymentMethod' => 'Credit Card',
                'paymentStatus' => 'completed',
                'paymentDate' => '2024-11-30 07:25:27',
                'totalPayment' => 30.00,
            ],
            [
                'paymentID' => 'PAY00004',
                'userID' => 'USREFFJM',
                'screeningID' => 'SCR00001',
                'paymentMethod' => 'E-Wallet',
                'paymentStatus' => 'completed',
                'paymentDate' => '2024-11-30 07:25:35',
                'totalPayment' => 25.00,
            ],
            [
                'paymentID' => 'PAY00005',
                'userID' => 'USREFFJM',
                'screeningID' => 'SCR00004',
                'paymentMethod' => 'Credit Card',
                'paymentStatus' => 'completed',
                'paymentDate' => '2024-11-30 07:25:40',
                'totalPayment' => 30.00,
            ],
            [
                'paymentID' => 'PAY00006',
                'userID' => 'USREFFJM',
                'screeningID' => 'SCR00005',
                'paymentMethod' => 'E-Wallet',
                'paymentStatus' => 'completed',
                'paymentDate' => '2024-11-29 07:25:44',
                'totalPayment' => 25.00,
            ],
        ]);
    }
}
