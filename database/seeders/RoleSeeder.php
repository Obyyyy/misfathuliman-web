<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat role (permissions di-assign lewat Shield UI)
        Role::firstOrCreate(['name' => 'super_admin',  'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'admin',        'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'guru_staf',         'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'humas',  'guard_name' => 'web']);

        $this->command->info('Role berhasil dibuat: super_admin, admin, guru_staff, humas');
    }
}