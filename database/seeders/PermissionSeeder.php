<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [

            ['id' => 1, 'name' => 'user_management_access',],
            ['id' => 2, 'name' => 'user_management_create',],
            ['id' => 3, 'name' => 'user_management_edit',],
            ['id' => 4, 'name' => 'user_management_view',],
            ['id' => 5, 'name' => 'user_management_delete',],
            ['id' => 6, 'name' => 'permission_access',],
            ['id' => 7, 'name' => 'permission_create',],
            ['id' => 8, 'name' => 'permission_edit',],
            ['id' => 9, 'name' => 'permission_view',],
            ['id' => 10, 'name' => 'permission_delete',],
            ['id' => 11, 'name' => 'role_access',],
            ['id' => 12, 'name' => 'role_create',],
            ['id' => 13, 'name' => 'role_edit',],
            ['id' => 14, 'name' => 'role_view',],
            ['id' => 15, 'name' => 'role_delete',],
            ['id' => 16, 'name' => 'user_access',],
            ['id' => 17, 'name' => 'user_create',],
            ['id' => 18, 'name' => 'user_edit',],
            ['id' => 19, 'name' => 'user_view',],
            ['id' => 20, 'name' => 'user_delete',],
            ['id' => 21, 'name' => 'course_access',],
            ['id' => 22, 'name' => 'course_create',],
            ['id' => 23, 'name' => 'course_edit',],
            ['id' => 24, 'name' => 'course_view',],
            ['id' => 25, 'name' => 'course_delete',],
            ['id' => 26, 'name' => 'lesson_access',],
            ['id' => 27, 'name' => 'lesson_create',],
            ['id' => 28, 'name' => 'lesson_edit',],
            ['id' => 29, 'name' => 'lesson_view',],
            ['id' => 30, 'name' => 'lesson_delete',],
            ['id' => 31, 'name' => 'question_access',],
            ['id' => 32, 'name' => 'question_create',],
            ['id' => 33, 'name' => 'question_edit',],
            ['id' => 34, 'name' => 'question_view',],
            ['id' => 35, 'name' => 'question_delete',],
            ['id' => 36, 'name' => 'questions_option_access',],
            ['id' => 37, 'name' => 'questions_option_create',],
            ['id' => 38, 'name' => 'questions_option_edit',],
            ['id' => 39, 'name' => 'questions_option_view',],
            ['id' => 40, 'name' => 'questions_option_delete',],
            ['id' => 41, 'name' => 'test_access',],
            ['id' => 42, 'name' => 'test_create',],
            ['id' => 43, 'name' => 'test_edit',],
            ['id' => 44, 'name' => 'test_view',],
            ['id' => 45, 'name' => 'test_delete',],


        ];
        $newPermissionItems = [
            'create-role',
            'edit-role',
            'delete-role',
            'create-user',
            'edit-user',
            'delete-user',
            'create-product',
            'edit-product',
            'delete-product',
        ];

        $startingId = 46;

        foreach ($newPermissionItems as $index => $permission) {
            $items[] = [
                'id' => $startingId + $index,
                'name' => 'test_' . str_replace('-', '_', $permission),
            ];
        }

        foreach ($items as $item) {
            Permission::create($item);
        }
    }
}
