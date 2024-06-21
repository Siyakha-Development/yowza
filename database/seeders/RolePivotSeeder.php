<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolePivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles if not already created
        $roles = [
            ['name' => 'Administrator (can create other users)'],
            // Add other roles as needed
        ];

        foreach ($roles as $roleData) {
            Role::firstOrCreate($roleData);
        }

        // Create permissions if not already created
        $existingPermissions = [
            ['name' => 'user_management_access'],
            ['name' => 'user_management_create'],
            ['name' => 'user_management_edit'],
            ['name' => 'user_management_view'],
            ['name' => 'user_management_delete'],
            // Add other permissions as needed
            ['name' => 'permission_access'],
            ['name' => 'permission_create'],
            ['name' => 'permission_edit'],
            ['name' => 'permission_view'],
            ['name' => 'permission_delete'],
            ['name' => 'role_access'],
            ['name' => 'role_create'],
            ['name' => 'role_edit'],
            ['name' => 'role_view'],
            ['name' => 'role_delete'],
            ['name' => 'user_access'],
            ['name' => 'user_create'],
            ['name' => 'user_edit'],
            ['name' => 'user_view'],
            ['name' => 'user_delete'],
            ['name' => 'course_access'],
            ['name' => 'course_create'],
            ['name' => 'course_edit'],
            ['name' => 'course_view'],
            ['name' => 'course_delete'],
            ['name' => 'lesson_access'],
            ['name' => 'lesson_create'],
            ['name' => 'lesson_edit'],
            ['name' => 'lesson_view'],
            ['name' => 'lesson_delete'],
            ['name' => 'question_access'],
            ['name' => 'question_create'],
            ['name' => 'question_edit'],
            ['name' => 'question_view'],
            ['name' => 'question_delete'],
            ['name' => 'questions_option_access'],
            ['name' => 'questions_option_create'],
            ['name' => 'questions_option_edit'],
            ['name' => 'questions_option_view'],
            ['name' => 'questions_option_delete'],
            ['name' => 'test_access'],
            ['name' => 'test_create'],
            ['name' => 'test_edit'],
            ['name' => 'test_view'],
            ['name' => 'test_delete'],
        ];

        foreach ($existingPermissions as $permissionData) {
            Permission::firstOrCreate($permissionData);
        }

        // Assign permissions to roles
        $rolePermissions = [
            1 => [
                'permission' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
            ],
            2 => [
                'permission' => [1, 21, 22, 23, 24, 26, 27, 28, 29, 31, 32, 33, 34, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45],
            ],
            3 => [
                'permission' => [1, 21, 24, 26, 29, 31, 34, 36, 37, 38, 39, 40, 41, 44],
            ],
            4 => [
                'permission' => [1, 21, 24, 26, 29, 31, 34, 36, 37, 38, 39, 40, 41, 44],
            ],
            // Add other roles with permissions as needed
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
            // Add other new permissions as needed
        ];

        foreach ($newPermissionItems as $newPermission) {
            Permission::firstOrCreate(['name' => $newPermission]);
        }

        foreach ($rolePermissions as $roleId => $item) {
            $role = Role::find($roleId);

            foreach ($item['permission'] as $permissionId) {
                $role->givePermissionTo($permissionId);
            }
        }
    }
}
