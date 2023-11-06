<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name' => 'pelapor']);
        Role::create(['name' => 'petugas']);
        Role::create(['name' => 'admin']); 
        $admin = \App\Models\User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@LaporIND.com',
            'password' => 12345678
        ]);

        $admin->assignRole('admin');

        $petugas = \App\Models\User::factory()->create([
            'username' => 'petugas',
            'email' => 'petugas@LaporIND.com',
            'password' => 12345678,
            'telepon' => '0812 8822 3567 9167'
        ]);

        $petugas->assignRole('petugas');
    }
}
