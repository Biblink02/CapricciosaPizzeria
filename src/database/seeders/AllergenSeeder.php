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
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'GLUTINE',
            'number' => 1,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'CROSTACEI E DERIVATI',
            'number' => 2,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'UOVA',
            'number' => 3,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'Crostacei e derivati',
            'number' => 4,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'ARACHIDI E DERIVATI',
            'number' => 5,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'SOIA E DERIVATI',
            'number' => 6,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'LATTE E DERIVATI',
            'number' => 7,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'FRUTTA A GUSCIO E DERIVATI',
            'number' => 8,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'SEDANO E DERIVATI',
            'number' => 9,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'SENAPE E DERIVATI',
            'number' => 10,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'SEMI DI SESAMO E DERIVATI',
            'number' => 11,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'ANIDRIDE SOLFOROSA E SOLFITI',
            'number' => 12,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'LUPINO E DERIVATI ',
            'number' => 13,
        ]);
        DB::table('allergens')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'MOLLUSCHI E DERIVATI',
            'number' => 14,
        ]);
    }
}
