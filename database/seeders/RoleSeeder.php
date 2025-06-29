<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Umkm
        Role::create([
            'name' => 'umkm'
        ]);
        // Link Productive
        Role::create([
            'name' => 'admin_lp'
        ]);
        // Industrial & Cooperative Office
        Role::create([
            'name' => 'admin_ico'
        ]);
        // Astra
        Role::create([
            'name' => 'admin_astra'
        ]);

        User::create([
            'name' => 'Link Productive',
            'email' => 'admin@lp',
            'password' => 11111111
        ])->assignRole('admin_lp');

        $umkm = User::create([
            'name' => 'Umkm',
            'email' => 'umkm@lp',
            'password' => 11111111
        ]);

        $umkm->assignRole('umkm');
        $umkm->umkm()->create();
    }
}
