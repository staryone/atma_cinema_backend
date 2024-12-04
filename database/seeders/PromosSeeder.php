<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promo::insert([
            [
                'promoID' => 'PRM0001',
                'name' => 'Cinema Festival',
                'description' => 'Experience the ultimate movie magic with our Cinema Festival! Enjoy exclusive discounts on blockbuster hits, classic films, and more. Don\'t miss out on this opportunity to indulge in the big-screen entertainment you love at unbeatable prices!',
                'pathImage' => 'https://i.ibb.co.com/4szGsc0/58e191de-79e0-41f6-8b56-307a4bd56d68.jpg',
                'isFnb' => false,
            ],
            [
                'promoID' => 'PRM0002',
                'name' => 'Movie Sale Banner',
                'description' => 'Lights, camera, action! Dive into the world of cinema with our special movie sale. From heartwarming dramas to thrilling adventures, enjoy great discounts on your favorite genres and make your movie nights unforgettable.',
                'pathImage' => 'https://i.ibb.co.com/G39L9L8/Whats-App-Image-2024-12-04-at-20-32-12-e260e90d.jpg',
                'isFnb' => false,
            ],
            [
                'promoID' => 'PRM0003',
                'name' => 'Webinar Movie Premiere',
                'description' => 'Step into the spotlight with our Webinar Movie Premiere event! Join us for an exclusive behind-the-scenes look at upcoming films, Q&A sessions with directors and stars, and special deals on pre-release screenings.',
                'pathImage' => 'https://i.ibb.co.com/nmWpW8z/1c59ad84-7ed1-460a-a983-26d69628c77e.jpg',
                'isFnb' => false,
            ],
            [
                'promoID' => 'PRM0004',
                'name' => 'National Popcorn Day',
                'description' => 'Celebrate the crunchiest day of the year with our National Popcorn Day promo! Treat yourself to a variety of delicious popcorn flavors and enjoy discounts on combos. Perfect for your next movie marathon!',
                'pathImage' => 'https://i.ibb.co.com/DDBh88Z/7cab68b1-1682-4632-9d7c-eb46fe37b745.jpg',
                'isFnb' => true,
            ],
            [
                'promoID' => 'PRM0005',
                'name' => 'Fast Food Sale',
                'description' => 'Satisfy your cravings with our Fast Food Sale! From crispy fries to juicy burgers, enjoy mouth-watering deals on all your fast food favorites. Make it a feast to remember without breaking the bank.',
                'pathImage' => 'https://i.ibb.co.com/2hpq0J3/Whats-App-Image-2024-12-04-at-20-37-28-e233d970.jpg',
                'isFnb' => true,
            ],
            [
                'promoID' => 'PRM0006',
                'name' => 'Ice Tea Special',
                'description' => 'Cool down with our refreshing Ice Tea Special! Choose from a variety of flavors and enjoy great discounts on every cup. It’s the perfect way to stay hydrated and treat yourself to a little indulgence.',
                'pathImage' => 'https://i.ibb.co.com/4mz5GLn/Whats-App-Image-2024-12-04-at-20-40-00-0802d06b.jpg',
                'isFnb' => true,
            ],
        ]);
    }
}
