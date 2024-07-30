<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Dish_Menu_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = [
            'Marinara',
            'Margherita D.O.P.',
            'Bufala',
            'Napoletana',
            'Alice',
            'Parmigiana',
            'Cacio e Pepe',
            'Tanita',
            'Diavola',
            'Bolognese',
            'Riace',
            'Capricciosa DOP',
            'Burrata e dintorni',
            'Baccalà',
            'Rughetta',
            'Cabras',
            'Iberica',
            'Vegetariana',
            'Calzone DOP'
        ];

        $menuUuid = DB::table('menus')->where('name', 'Pizza')->first()->uuid;

        foreach ($dishes as $dish) {
            $dishUuid = DB::table('dishes')->where('name', $dish)->first()->uuid;

            DB::table('dish_menu')->insert([
                'dish_uuid' => $dishUuid,
                'menu_uuid' => $menuUuid,
                'price' => 0,
                'sort_key' => 0,
            ]);
        }
    }
}
