<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
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

        foreach ($dishes as $dish) {
            DB::table('dishes')->insert([
                'uuid' => uuid_create(),
                'created_at' => today(),
                'updated_at' => today(),
                'name' => $dish,
                'img_url' => null,
                'is_visible' => true,
            ]);
        }
    }
}

