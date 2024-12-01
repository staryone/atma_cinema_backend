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
                'pathImage' => 'https://img.freepik.com/free-vector/cinema-festival-horizontal-sale-banner-template_23-2149939419.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
                'isFnb' => false,
            ],
            [
                'promoID' => 'PRM0002',
                'name' => 'Movie Sale Banner',
                'description' => 'Lights, camera, action! Dive into the world of cinema with our special movie sale. From heartwarming dramas to thrilling adventures, enjoy great discounts on your favorite genres and make your movie nights unforgettable.',
                'pathImage' => 'https://img.freepik.com/free-vector/cinema-movie-festival-horizontal-sale-banner-template_23-2149967269.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
                'isFnb' => false,
            ],
            [
                'promoID' => 'PRM0003',
                'name' => 'Webinar Movie Premiere',
                'description' => 'Step into the spotlight with our Webinar Movie Premiere event! Join us for an exclusive behind-the-scenes look at upcoming films, Q&A sessions with directors and stars, and special deals on pre-release screenings.',
                'pathImage' => 'https://img.freepik.com/free-vector/realistic-webinar-template-movie-premiere-event_23-2149496022.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
                'isFnb' => false,
            ],
            [
                'promoID' => 'PRM0004',
                'name' => 'National Popcorn Day',
                'description' => 'Celebrate the crunchiest day of the year with our National Popcorn Day promo! Treat yourself to a variety of delicious popcorn flavors and enjoy discounts on combos. Perfect for your next movie marathon!',
                'pathImage' => 'https://img.freepik.com/free-vector/flat-national-popcorn-day-horizontal-banner-template_52683-150715.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
                'isFnb' => true,
            ],
            [
                'promoID' => 'PRM0005',
                'name' => 'Fast Food Sale',
                'description' => 'Satisfy your cravings with our Fast Food Sale! From crispy fries to juicy burgers, enjoy mouth-watering deals on all your fast food favorites. Make it a feast to remember without breaking the bank.',
                'pathImage' => 'https://img.freepik.com/free-vector/flat-design-fast-food-sale-banner-template-design_52683-147234.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
                'isFnb' => true,
            ],
            [
                'promoID' => 'PRM0006',
                'name' => 'Ice Tea Special',
                'description' => 'Cool down with our refreshing Ice Tea Special! Choose from a variety of flavors and enjoy great discounts on every cup. It’s the perfect way to stay hydrated and treat yourself to a little indulgence.',
                'pathImage' => 'https://img.freepik.com/premium-vector/ice-tea-drink-banner-store-print-promotional-business-design-template_737924-1045.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
                'isFnb' => true,
            ],
        ]);
    }
}
