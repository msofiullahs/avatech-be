<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new UserRole();
        $role->title = 'Administrator';
        $role->save();

        $role = new UserRole();
        $role->title = 'Reporter';
        $role->save();

        $role = new UserRole();
        $role->title = 'Assignee';
        $role->save();
    }
}
