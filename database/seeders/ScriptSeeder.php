<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScriptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scripts')->insert([
            ['name' => 'Latinica'],
            ['name' => 'Ćirilica'],
            ['name' => 'Kinesko pismo'],
            ['name' => 'Arapsko pismo'],
            ['name' => 'Bengalsko-Asamsko pismo'],
            ['name' => 'Malajlam pismo'],
            ['name' => 'Tajlandsko pismo'],
            ['name' => 'Lao pismo'],
            ['name' => 'Hebrejsko pismo'],
            ['name' => 'Jermensko pismo'],
            ['name' => 'Grčko pismo'],
            ['name' => 'Tibetansko pismo'],
            ['name' => 'Gruzijsko pismo'],
            ['name' => 'Mongolsko pismo'],
        ]);
    }
}
