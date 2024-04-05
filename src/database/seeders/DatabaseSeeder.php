<?php

namespace Database\Seeders;

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
        //TODO sistema i seeder magari facendo prendere tutto da file, anche le relazioni
        $this->call([
            MenuSeeder::class,
            AllergenSeeder::class,
            DishSeeder::class,
            IngredientSeeder::class,
            Dish_Menu_Seeder::class,
        ]);
    }
}
