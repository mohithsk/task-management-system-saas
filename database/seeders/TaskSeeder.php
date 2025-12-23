<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
            'title' => 'Buy groceries',
            'description' => 'Milk, eggs, bread',
            'priority' => 'Medium',
            'status' => 'Pending',
        ]);

        Task::create([
            'title' => 'Finish report',
            'description' => 'Quarterly financials',
            'priority' => 'High',
            'status' => 'Pending',
        ]);

        Task::create([
            'title' => 'Call Alice',
            'description' => null,
            'priority' => 'Low',
            'status' => 'Completed',
        ]);
    }
}
