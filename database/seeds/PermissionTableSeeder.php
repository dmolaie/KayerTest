<?php

use Carbon\Carbon;
use Domains\Category\Entities\Category;
use Domains\Menu\Repositories\MenusRepository;
use Domains\Menu\Services\Contracts\DTOs\MenusCreateDTO;
use Domains\User\Entities\User;
use Illuminate\Database\Seeder;

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
            [
                'name'     => 'createCategory',
                'label'    => 'ایجاد دسته بندی',
                'role_id'  => 2
                ],
            ];
        $this->makePermission($permissionList);

    }

    private function makePermission(array $permissionList)
    {
        $permission = new \App\Domains\Role\Enitites\Permission();
        foreach ($permissionList as $item) {
            $itemCreate['name'] = $item['name'];
            $itemCreate['$itemCreate'] = $item['label'];
            $permissionCreated = $permission->create($itemCreate);
            $permission->attach([
                'role_id' => $item['role_id'],
                'permission_id' => $permissionCreated->id
            ]);
        }

    }
}
