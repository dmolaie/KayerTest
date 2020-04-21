<?php


namespace Domains\Menu\Http\Presenters;


class AdminMenuPresenter
{

    public function transform($roleDTO): array
    {
        if (!$roleDTO) {
            return $this->defaultMenu();
        }
        $menuList = [];
        foreach (config('menus.admin_menu') as $key => $menu) {
            if (isset($menu[$roleDTO->getType()]) && in_array($roleDTO->getStatus(), $menu[$roleDTO->getType()])) {

                $menuList[] = [
                    'en_name' => $key,
                    'fa_name' => trans('menus::menu.admin_menu')[$key]
                ];
            }
        }
        return $menuList ?? $this->defaultMenu();
    }

    private function defaultMenu()
    {
        return [
            [
                'en_name' => 'counter',
                'fa_name' => trans('menus::menu.admin_menu.counter')
            ],
            [
                'en_name' => 'profile_setting',
                'fa_name' => trans('menus::menu.admin_menu.profile_setting')
            ]
        ];
    }
}