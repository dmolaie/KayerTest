<?php

use Carbon\Carbon;
use Domains\Article\Repositories\ArticleRepository;
use Domains\Article\Services\Contracts\DTOs\ArticleCreateDTO;
use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articleCreateDTO = new ArticleCreateDTO();
        $articleCreateDTO->setProvinceId(Province::first()->id)
            ->setAbstract('test abstract')
            ->setCategories([Category::where('type', 'article')->first()->id])
            ->setDescription('test description')
            ->setPublisher(User::first())
            ->setLanguage('fa')
            ->setFirstTitle('first_title')
            ->setPublishDate(
                Carbon::now()->format('Y-m-d h:m:s')
            )
            ->setSecondTitle('second_title')
            ->setThirdTitle('third_title')
            ->setStatus('accept')
            ->setSlug('slug'.rand(1,1000))
            ->setUuid( \App\Http\Controllers\UuIdTrait::randomStrings(8));
        $articleRepository = app(ArticleRepository::class);
        $articleRepository->create($articleCreateDTO);

    }
}
