<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Table::insert([
            ['name' => 'Meja 1', 'is_available' => true],
            ['name' => 'Meja 2', 'is_available' => true],
            ['name' => 'Meja 3', 'is_available' => true],
            ['name' => 'Meja 4', 'is_available' => true],
        ]);
    }
}
