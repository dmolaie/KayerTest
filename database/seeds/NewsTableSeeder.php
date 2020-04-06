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
            'pending'
        ];
        foreach ($statuses as $status) {
            $this->makeNews($status);
        }

    }

    private function makeNews($status)
    {
        $rand = rand(1, 10000);
        News::insert(
            [
                [
                    "first_title" => ' تست ' . $status . 'خبر ' . rand(100, 10000),
                    'uuid' => \App\Http\Controllers\UuIdTrait::randomStrings(8),
                    "publish_date" => Carbon::now()->format('Y-m-d h:m:s'),
                    'status' => $status,
                    'province_id' => Province::first()->id,
                    'language' => 'fa',
                    'slug' => 'test-1' . $rand,
                    'publisher_id' => User::first()->id
                ],
                [
                    "first_title" => ' تست ' . $status . 'خبر ' . rand(100, 10000),
                    'uuid' => \App\Http\Controllers\UuIdTrait::randomStrings(8),
                    "publish_date" => Carbon::now()->subDay(rand(3, 10))->format('Y-m-d h:m:s'),
                    'status' => $status,
                    'province_id' => Province::first()->id,
                    'language' => 'fa',
                    'slug' => 'test-2' . $rand,
                    'publisher_id' => User::first()->id
                ],
                [
                    "first_title" => ' تست ' . $status . 'خبر ' . rand(100, 10000),
                    'uuid' => \App\Http\Controllers\UuIdTrait::randomStrings(8),
                    "publish_date" => Carbon::tomorrow()->format('Y-m-d h:m:s'),
                    'status' => $status,
                    'province_id' => Province::first()->id,
                    'language' => 'fa',
                    'slug' => 'test-3' . $rand,
                    'publisher_id' => User::first()->id
                ],
                [
                    "first_title" => ' تست ' . $status . 'خبر ' . rand(100, 10000),
                    'uuid' => \App\Http\Controllers\UuIdTrait::randomStrings(8),
                    "publish_date" => Carbon::now()->addMinutes(5)->format('Y-m-d h:m:s'),
                    'status' => $status,
                    'province_id' => Province::first()->id,
                    'language' => 'fa',
                    'slug' => 'test-4' . $rand,
                    'publisher_id' => User::first()->id
                ],
            ]
        );
    }
}
