<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assign admin ke user ID 1
        $admin = User::find(1);
        $admin?->assignRole('super_admin');

        // Assign guru ke semua user lainnya yang belum punya role
        User::where('id', '!=', 1)->get()->each(function ($user) {
            if ($user->roles->isEmpty()) {
                $user->assignRole('guru_staf');
            }
        });

        $this->command->info('Role berhasil di-assign.');
    }
}
