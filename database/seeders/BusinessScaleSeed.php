<?php

namespace Database\Seeders;

use App\Models\BusinessScale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessScaleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessScale::insert([
            [
                'name' => 'Mikro'
            ],
            [
                'name' => 'Makro'
            ]
        ]);
    }
}
