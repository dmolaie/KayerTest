<?php

use Domains\Role\Enitites\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionList = [
            'news',
            'article',
            'event'
        ];
        $this->makePermission($permissionList);

    }

    private function makePermission(array $permissionList)
    {
        $baseMethods = [
            [
                'name'  => 'create',
                'label' => 'ایجاد'
            ],
            [
                'name'  => 'edit',
                'label' => 'ویرایش'
            ],
            [
                'name'  => 'changeStatus',
                'label' => 'تغییر وضعیت'
            ],
            [
                'name'  => 'getListForAdmin',
                'label' => '‌گزارش‌گیری'
            ],
            [
                'name'  => 'delete',
                'label' => 'حذف'
            ],
        ];
        $this->truncatePermission();
        $permission = new Permission();
        foreach ($permissionList as $item) {
            foreach ($baseMethods as $baseMethod) {
                $permission->create([
                    'name'  => $item . '-' . $baseMethod['name'],
                    'label' => $baseMethod['label'],
                    'model' => $item,
                ]);
            }
        }

    }

    private function truncatePermission()
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
