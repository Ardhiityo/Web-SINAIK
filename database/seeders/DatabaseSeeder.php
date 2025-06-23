<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            SectorCategorySeed::class,
            BusinessScaleSeed::class,
            CertificationSeed::class,
            ServiceCategorySeed::class
        ]);
    }
}
