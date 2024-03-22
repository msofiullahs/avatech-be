<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->role_id = 1;
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->password = bcrypt('q2r5D3Jx');
        $user->save();

        // 2
        $user = new User();
        $user->name = 'Reporter One';
        $user->email = 'reporter1@gmail.com';
        $user->role_id = 2;
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->password = bcrypt('T7qSew8F');
        $user->save();

        // 3
        $user = new User();
        $user->name = 'Reporter Two';
        $user->email = 'reporter2@gmail.com';
        $user->role_id = 2;
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->password = bcrypt('kPTCEq9w');
        $user->save();

        // 4
        $user = new User();
        $user->name = 'Assignee One';
        $user->email = 'assignee1@gmail.com';
        $user->role_id = 3;
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->password = bcrypt('DbX2y3n9');
        $user->save();

        // 5
        $user = new User();
        $user->name = 'Assignee Two';
        $user->email = 'assignee2@gmail.com';
        $user->role_id = 3;
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->password = bcrypt('F6dH3bhD');
        $user->save();
    }
}
