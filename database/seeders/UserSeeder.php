<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $departmentId = DB::table('departments')
            ->where('code', 'IS')
            ->value('id');

        $groupId = DB::table('groups')
            ->where('name', 'ИС-21')
            ->value('id');

        $users = [
            [
                'name' => 'Иван Петров',
                'email' => 'teacher1@example.com',
                'role' => 'teacher',
                'department_id' => $departmentId,
                'group_id' => null,
            ],
            [
                'name' => 'Мария Иванова',
                'email' => 'teacher2@example.com',
                'role' => 'teacher',
                'department_id' => $departmentId,
                'group_id' => null,
            ],
            [
                'name' => 'Алексей Смирнов',
                'email' => 'student1@example.com',
                'role' => 'student',
                'department_id' => null,
                'group_id' => $groupId,
            ],
            [
                'name' => 'Елена Кузнецова',
                'email' => 'student2@example.com',
                'role' => 'student',
                'department_id' => null,
                'group_id' => $groupId,
            ],
            [
                'name' => 'Дмитрий Попов',
                'email' => 'student3@example.com',
                'role' => 'student',
                'department_id' => null,
                'group_id' => $groupId,
            ],
            [
                'name' => 'Анна Васильева',
                'email' => 'student4@example.com',
                'role' => 'student',
                'department_id' => null,
                'group_id' => $groupId,
            ],
            [
                'name' => 'Михаил Новиков',
                'email' => 'student5@example.com',
                'role' => 'student',
                'department_id' => null,
                'group_id' => $groupId,
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                array_merge($user, [
                    'password' => Hash::make('password'),
                    'academic_rating' => 1000,
                    'academic_activity_points' => 0,
                    'social_activity_points' => 0,
                    'updated_at' => now(),
                    'created_at' => now(),
                ])
            );
        }
    }
}
