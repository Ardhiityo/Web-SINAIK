<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceCategory::insert([
            [
                'name' => 'Program Pelatihan Siap Kerja'
            ],
            [
                'name' => 'Program CSR Berkelanjutan'
            ],
        ]);
    }
}
