<?php

namespace Database\Seeders;

use App\Models\Fnb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FnbsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fnb::insert([
            [
                'fnbID' => 'FNB00001',
                'name' => 'Popcorn Bowl',
                'category' => 'Popcorn',
                'description' => 'A delightful snack of freshly popped golden corn, lightly salted and served warm. Perfect for movie nights or as a tasty treat anytime!',
                'price' => 40000,
                'pathImage' => 'https://img.freepik.com/free-photo/delicious-popcorn_144627-12668.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
            ],
            [
                'fnbID' => 'FNB00002',
                'name' => 'Triple Popcorn',
                'category' => 'Combo',
                'description' => 'A generous mix of three popcorn flavors—classic butter, savory cheese, and sweet caramel—offering a trio of irresistible tastes. Perfect for sharing or indulging solo!',
                'price' => 80000,
                'pathImage' => 'https://img.freepik.com/free-photo/top-view-fresh-popcorn-salted-tasty-yellow-snack-corn-seed_140725-25084.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
            ],
            [
                'fnbID' => 'FNB00003',
                'name' => 'French Fries',
                'category' => 'Light Meal',
                'description' => 'Crispy and golden on the outside, soft and fluffy on the inside. These classic fries are perfectly seasoned and served fresh—an all-time favorite snack or side dish!',
                'price' => 30000,
                'pathImage' => 'https://img.freepik.com/free-photo/crispy-french-fries-with-ketchup-mayonnaise_1150-26588.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
            ],
            [
                'fnbID' => 'FNB00004',
                'name' => 'Brown Tea',
                'category' => 'Drinks',
                'description' => 'A soothing blend of premium tea leaves with a hint of caramelized sweetness, creating a rich and refreshing drink perfect for any time of the day.',
                'price' => 15000,
                'pathImage' => 'https://img.freepik.com/free-photo/ice-falling-brown-drink_1194-1074.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
            ],
            [
                'fnbID' => 'FNB00005',
                'name' => 'Dark Chocolate',
                'category' => 'Beverage',
                'description' => 'A velvety, indulgent drink crafted from rich, premium dark chocolate. Perfectly balanced with a touch of sweetness, it\'s a luxurious treat for chocolate lovers.',
                'price' => 20000,
                'pathImage' => 'https://img.freepik.com/free-photo/close-up-view-chocolate-milkshake-with-walnuts_23-2148746728.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
            ],
            [
                'fnbID' => 'FNB00006',
                'name' => 'PopDrink',
                'category' => 'Combo',
                'description' => 'The ultimate combo of enjoyment! A refreshing drink paired with a delicious popcorn bowl, making it the perfect duo for movie nights or anytime cravings.',
                'price' => 45000,
                'pathImage' => 'https://img.freepik.com/free-photo/popcorn-with-soda-colorful-background_23-2148258396.jpg?ga=GA1.1.1961374560.1716992282&semt=ais_hybrid',
            ],
        ]);
    }
}
