<?php


namespace Domains\Menu\Http\Presenters;


class AdminMenuPresenter
{

    public function transform($roleDTO): array
    {
        if (!$roleDTO) {
            return $this->defaultMenu();
        }

        $menuList = $this->menuList($roleDTO, config('menus.admin_menu'));
        return count($menuList) > 0 ? $menuList : $this->defaultMenu();
    }

    private function defaultMenu()
    {
        return [
            [
                'en_name'  => 'dashboard',
                'fa_name'  => trans('menus::menu.admin_menu.dashboard'),
                'children' => [],
            ],
            [
                'en_name'  => 'profile_setting',
                'fa_name'  => trans('menus::menu.admin_menu.profile_setting'),
                'children' => [],
            ]
        ];
    }

    /**
     * @param $roleDTO
     * @param array $menuList
     * @return array
     */
    protected function menuList($roleDTO, array $menuList): array
    {
        $data = [];
        foreach ($menuList as $key => $menu) {

            if (isset($menu['roles'][$roleDTO->getType()]) && in_array($roleDTO->getStatus(),
                    $menu['roles'][$roleDTO->getType()])) {

                $data[] = [
                    'en_name'  => $key,
                    'fa_name'  => trans('menus::menu.admin_menu')[$key],
                    'children' => $this->menuList($roleDTO, $menu['children'])
                ];
            }
        }
        return $data;
    }
}