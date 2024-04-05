<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            'uuid' => uuid_create(),
            'created_at' => today(),
            'updated_at' => today(),
            'name' => 'Pizza',
            'img_url' => null,
            'is_visible' => true,
            'is_visible_in_menus' => true,
            'sort_key_in_menus' => 0,

        ]);
    }
}

