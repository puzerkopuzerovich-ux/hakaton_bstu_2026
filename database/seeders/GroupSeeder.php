<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        $departmentId = DB::table('departments')
            ->where('name', 'Кафедра информационных систем')
            ->value('id');

        DB::table('groups')->updateOrInsert(
            ['name' => 'ИС-21'],
            ['department_id' => $departmentId, 'updated_at' => now(), 'created_at' => now()]
        );
    }
}
