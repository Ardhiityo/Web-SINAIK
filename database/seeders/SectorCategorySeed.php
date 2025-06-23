<?php

namespace Database\Seeders;

use App\Models\SectorCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectorCategory::insert([
            [
                'name' => 'Makanan'
            ],
            [
                'name' => 'Minuman'
            ],
            [
                'name' => 'Bahan Pokok'
            ],
        ]);
    }
}
