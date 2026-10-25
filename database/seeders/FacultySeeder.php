<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faculties')->updateOrInsert(
            ['code' => 'FIT'],
            ['name' => 'Факультет информационных технологий', 'updated_at' => now(), 'created_at' => now()]
        );
    }
}
