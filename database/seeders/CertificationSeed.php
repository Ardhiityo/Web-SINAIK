<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificationSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Certification::insert([
            [
                'name' => 'BPOM'
            ],
            [
                'name' => 'Halal'
            ],
            [
                'name' => 'PIRT'
            ]
        ]);
    }
}
