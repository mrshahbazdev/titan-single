<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoProductSeeder extends Seeder
{
    public function run(): void
    {
        // ── Product Categories ──
        $categories = [
            ['id' => 1, 'categoryName' => 'Tour Packages', 'status' => 1],
            ['id' => 2, 'categoryName' => 'Hotel Bookings', 'status' => 1],
            ['id' => 3, 'categoryName' => 'Flight Tickets', 'status' => 1],
            ['id' => 4, 'categoryName' => 'Car Rentals', 'status' => 1],
            ['id' => 5, 'categoryName' => 'Cruise Packages', 'status' => 1],
        ];

        foreach ($categories as $category) {
            DB::table('productcategories')->insertOrIgnore($category);
        }

        // ── Demo Products ──
        $products = [
            [
                'id' => 1,
                'productName' => 'Dubai City Tour - 5 Days',
                'productPrice' => 45000.00,
                'productImage' => '',
                'productCategory' => 'Tour Packages',
                'productDescription' => '5-day all-inclusive Dubai city tour including Burj Khalifa, Desert Safari, Dubai Mall, and Marina Cruise.',
                'status' => 1,
            ],
            [
                'id' => 2,
                'productName' => 'Istanbul Heritage Tour - 7 Days',
                'productPrice' => 65000.00,
                'productImage' => '',
                'productCategory' => 'Tour Packages',
                'productDescription' => '7-day Istanbul heritage tour covering Hagia Sophia, Blue Mosque, Grand Bazaar, and Bosphorus Cruise.',
                'status' => 1,
            ],
            [
                'id' => 3,
                'productName' => 'Maldives Beach Resort - 4 Nights',
                'productPrice' => 120000.00,
                'productImage' => '',
                'productCategory' => 'Hotel Bookings',
                'productDescription' => '4-night stay at a luxury beach resort in Maldives with water villa, full board meals, and snorkeling.',
                'status' => 1,
            ],
            [
                'id' => 4,
                'productName' => 'Lahore to Dubai - Round Trip',
                'productPrice' => 55000.00,
                'productImage' => '',
                'productCategory' => 'Flight Tickets',
                'productDescription' => 'Round trip economy class ticket from Lahore to Dubai with 30kg baggage allowance.',
                'status' => 1,
            ],
            [
                'id' => 5,
                'productName' => 'Baku Azerbaijan Tour - 4 Days',
                'productPrice' => 38000.00,
                'productImage' => '',
                'productCategory' => 'Tour Packages',
                'productDescription' => '4-day Baku tour covering Flame Towers, Old City, Heydar Aliyev Center, and Mud Volcanoes.',
                'status' => 1,
            ],
            [
                'id' => 6,
                'productName' => 'Thailand Phuket Package - 5 Days',
                'productPrice' => 75000.00,
                'productImage' => '',
                'productCategory' => 'Tour Packages',
                'productDescription' => '5-day Phuket beach package with island hopping, Thai massage, and water sports activities.',
                'status' => 1,
            ],
            [
                'id' => 7,
                'productName' => 'Dubai Airport Car Rental - Daily',
                'productPrice' => 8000.00,
                'productImage' => '',
                'productCategory' => 'Car Rentals',
                'productDescription' => 'Daily car rental from Dubai Airport. Sedan category with unlimited mileage and insurance.',
                'status' => 1,
            ],
            [
                'id' => 8,
                'productName' => 'Mediterranean Cruise - 7 Nights',
                'productPrice' => 250000.00,
                'productImage' => '',
                'productCategory' => 'Cruise Packages',
                'productDescription' => '7-night Mediterranean cruise visiting Greece, Italy, and Turkey with all meals and entertainment.',
                'status' => 1,
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insertOrIgnore($product);
        }
    }
}
