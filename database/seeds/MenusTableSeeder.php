<?php

use Carbon\Carbon;
use Domains\Menu\Entities\Menus;
use Domains\User\Entities\User;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rand = rand(10,1000);
        Menus::insert([
                [
                    'name' => 'menu test'. $rand,
                    'title' => ' منو تست'. $rand,
                    'alias' => 'test alias '. $rand,
                    'type'=>'link',
                    "language"=>'fa',
                    "publish_date"=>Carbon::now(),
                    "publisher_id"=> User::first()->id,
                    'priority'=>1,
                    'active'=>true
                ],
                [
                    'name'         => 'menu test 2' . $rand,
                    'title'        => '2 منو تست' . $rand,
                    'alias'        => 'test alias2 ' . $rand,
                    'type'         => 'separator',
                    "language"     => 'fa',
                    "publish_date" => Carbon::now(),
                    "publisher_id" => User::first()->id,
                    'priority'     => 1,
                    'active'       => true
                ]
            ]
        );

        Menus::insert([
                           [
                    'name' => 'menu test3'. $rand,
                    'title' => ' 3منو تست'. $rand,
                    'alias' => 'test alias3 '. $rand,
                    'type'=>'link',
                    "language"=>'fa',
                    "publish_date"=>Carbon::now(),
                    "publisher_id"=> User::first()->id,
                    'priority'=>1,
                    'parent_id'=>Menus::first()->id,
                    'active'=>true
                ],
        ]);
        Menus::insert([
            [
                'name'         => 'menu test4' . $rand,
                'title'        => ' 4منو تست' . $rand,
                'alias'        => 'test alias4 ' . $rand,
                'type'         => 'link',
                "language"     => 'fa',
                "publish_date" => Carbon::now(),
                "publisher_id" => User::first()->id,
                'priority'     => 1,
                'parent_id' => Menus::latest()->first()->id,
                'active'       => true
            ],

        ]);
    }
}
