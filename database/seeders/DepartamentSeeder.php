<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentSeeder extends Seeder
{
    public function run(): void
    {
        $facultyId = DB::table('faculties')->where('code', 'FIT')->value('id');

        DB::table('departments')->updateOrInsert(
            ['faculty_id' => $facultyId, 'name' => 'Кафедра информационных систем'],
            ['code' => 'IS', 'updated_at' => now(), 'created_at' => now()]
        );
    }
}
