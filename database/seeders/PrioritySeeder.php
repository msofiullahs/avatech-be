<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priority = new Priority();
        $priority->name = 'Urgent';
        $priority->color = '#bc0000';
        $priority->save();

        $priority = new Priority();
        $priority->name = 'High';
        $priority->color = '#ffe900';
        $priority->save();

        $priority = new Priority();
        $priority->name = 'Normal';
        $priority->color = '#0083ff';
        $priority->save();

        $priority = new Priority();
        $priority->name = 'Low';
        $priority->color = '#00cc44';
        $priority->save();
    }
}
