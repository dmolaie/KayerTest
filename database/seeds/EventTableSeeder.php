<?php

use Carbon\Carbon;
use Domains\Category\Entities\Category;
use Domains\Event\Repositories\EventRepository;
use Domains\Event\Services\Contracts\DTOs\EventCreateDTO;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventCreateDTO = new EventCreateDTO();
        $eventCreateDTO->setProvinceId(Province::first()->id)
            ->setAbstract('abstract')
            ->setCategoryIds([Category::where('type', 'event')->first()->id])
            ->setDescription('description')
            ->setPublisher(User::first())
            ->setLanguage('fa')
            ->setTitle('title')
            ->setLocation('location')
            ->setPublishDate(Carbon::now()->format('Y-m-d H:m:s'))
            ->setEventStartDate(Carbon::now()->format('Y-m-d H:m:s'))
            ->setEventEndDate(Carbon::now()->format('Y-m-d H:m:s'))
            ->setEventStartRegisterDate(Carbon::now()->format('Y-m-d H:m:s'))
            ->setEventEndRegisterDate(Carbon::now()->format('Y-m-d H:m:s'))
            ->setSourceLinkText('source_link_text')
            ->setSourceLinkImage('source_link_image')
            ->setStatus('accept')
            ->setSourceLinkVideo('source_link_video');
        $eventRepository = app(EventRepository::class);
        $eventRepository->create($eventCreateDTO);
    }
}
