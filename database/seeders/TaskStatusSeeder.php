<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = new TaskStatus();
        $status->title = 'To Do';
        $status->save();

        $status = new TaskStatus();
        $status->title = 'In Progress';
        $status->save();

        $status = new TaskStatus();
        $status->title = 'In Review';
        $status->save();

        $status = new TaskStatus();
        $status->title = 'Completed';
        $status->save();
    }
}
