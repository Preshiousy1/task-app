<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            'title' => 'First Task',
            'description' => 'A completed task',
            'completed' => true,
        ],);
        DB::table('tasks')->insert([
            'title' => 'Second Task',
            'description' => 'An uncompleted task',
            'completed' => false,
        ],);
    }
}
