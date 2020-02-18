<?php

use Carbon\Carbon;
use Domains\Location\Entities\Province;
use Domains\News\Entities\News;
use Domains\User\Entities\User;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'accept',
            'reject',
            'pending',
            'inactive'
        ];
        foreach ($statuses as $status){
            $this->makeNews($status);
        }

    }

    private function makeNews($status)
    {
        News::insert(
            [
                [
                    "first_title"  => ' تست '.$status.'خبر ' . rand(100, 10000),
                    "publish_date" => Carbon::now()->format('Y-m-d h:m:s'),
                    'status'       => $status,
                    'province_id'  => Province::first()->id,
                    'language'     => 'fa',
                    'publisher_id' => User::first()->id
                ],
                [
                    "first_title"  => ' تست ' . $status . 'خبر ' . rand(100, 10000),
                    "publish_date" => Carbon::now()->subDay(rand(3, 10))->format('Y-m-d h:m:s'),
                    'status'       => $status,
                    'province_id'  => Province::first()->id,
                    'language'     => 'fa',
                    'publisher_id' => User::first()->id
                ],
                [
                    "first_title"  => ' تست ' . $status . 'خبر ' . rand(100, 10000),
                    "publish_date" => Carbon::tomorrow()->format('Y-m-d h:m:s'),
                    'status'       => $status,
                    'province_id'  => Province::first()->id,
                    'language'     => 'fa',
                    'publisher_id' => User::first()->id
                ],
                [
                    "first_title"  => ' تست ' . $status . 'خبر ' . rand(100, 10000),
                    "publish_date" => Carbon::now()->addMinutes(5)->format('Y-m-d h:m:s'),
                    'status'       => $status,
                    'province_id'  => Province::first()->id,
                    'language'     => 'fa',
                    'publisher_id' => User::first()->id
                ],
            ]
        );
    }
}
