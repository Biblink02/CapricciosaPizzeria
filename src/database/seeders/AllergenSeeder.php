<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allergensData = [
            [
                'name' => 'GLUTINE',
                'number' => 1
            ],
            [
                'name' => 'CROSTACEI E DERIVATI',
                'number' => 2
            ],
            [
                'name' => 'UOVA',
                'number' => 3
            ],
            [
                'name' => 'PESCE E DERIVATI',
                'number' => 4
            ],
            [
                'name' => 'ARACHIDI E DERIVATI',
                'number' => 5
            ],
            [
                'name' => 'SOIA E DERIVATI',
                'number' => 6
            ],
            [
                'name' => 'LATTE E DERIVATI',
                'number' => 7
            ],
            [
                'name' => 'FRUTTA A GUSCIO E DERIVATI',
                'number' => 8
            ],
            [
                'name' => 'SEDANO E DERIVATI',
                'number' => 9
            ],
            [
                'name' => 'SENAPE E DERIVATI',
                'number' => 10
            ],
            [
                'name' => 'SEMI DI SESAMO E DERIVATI',
                'number' => 11
            ],
            [
                'name' => 'ANIDRIDE SOLFOROSA E SOLFITI',
                'number' => 12
            ],
            [
                'name' => 'LUPINO E DERIVATI ',
                'number' => 13
            ],
            [
                'name' => 'MOLLUSCHI E DERIVATI',
                'number' => 14
            ]
        ];

        foreach ($allergensData as $allergen) {
            DB::table('allergens')->insert([
                'uuid' => uuid_create(),
                'created_at' => today(),
                'updated_at' => today(),
                'name' => $allergen['name'],
                'number' => $allergen['number']
            ]);
        }
    }
}
