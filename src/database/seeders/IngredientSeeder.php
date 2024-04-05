<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            'Pomodoro San Marzano Marrazzo',
            'Aglio',
            'Origano della Valle del Sarno (SA)',
            'Olio',
            'Mozzarella fiordilatte Caseificio Fratelli Beneduce (NA)',
            'Basilico fresco',
            'Mozzarella di bufala Caseificio La Fattoria Gaia (NA)',
            'Salsiccia',
            'Friarielli',
            'Olive Taggiasche',
            'Capperi di Pantelleria IGP',
            'FC Alici',
            'Melanzane fritte',
            'FC Prosciutto crudo di Parma DOP',
            'Parmigiano Reggiano DOP 24 mesi',
            'Caciocavallo Irpino e Pepe Tellicherry',
            'FC Prosciutto Crudo di Parma DOP',
            'Mostarda di cipolle',
            'Salsiccia di calabria piccante',
            'Stracciatella di Putignano (BA)',
            'Pesto di pistacchio',
            'FC: Mortadella',
            'Granella di pistacchio di Bronte',
            'Tonno pinna gialla',
            'Cipolla rossa di tropea',
            'Nduja',
            'Pomodorini essiccati',
            'Prosciutto cotto piemontese',
            'Carciofino',
            'Funghi porcini trentini',
            'Olive nere di cerignola',
            'Burrata di Bufala',
            'Datterino giallo Marrazzo',
            'FC Capocollo di Martina Franca',
            'Baccalà qualità Ragno',
            'Cubetti di polenta di Storo fritta',
            'Burrata di bufala caseificio Olanda pugliese',
            'Pomodoro datterino rosso',
            'Rucola',
            'Fagioli Cannellino',
            'Sedano sminuzzato',
            'Pepe Tellicherry',
            'Bottarga di muggine di Cabras',
            'Lardo "pata negra"',
            'Gorgonzola e noci',
            'Zucchine',
            'Peperoni',
            'Ricotta di bufala',
            'Salame',
            'Salsa di pomodoro San Marzano Marrazzo'
        ];

        foreach ($ingredients as $ingredient) {
            DB::table('ingredients')->insert([
                'uuid' => uuid_create(),
                'created_at' => today(),
                'updated_at' => today(),
                'name' => $ingredient,
                'img_url' => null,
                'is_visible' => true,
                'supplier_uuid' => null,
            ]);
        }

    }
}
