<?php 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('computers')->insert([
                'computer_name' => 'Lab' . $faker->randomNumber(2) . '-PC' . $faker->randomNumber(2),
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M720']),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu 20.04', 'macOS Catalina']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-11700', 'AMD Ryzen 5 5600G']),
                'memory' => $faker->randomElement([8, 16, 32]),
                'available' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
