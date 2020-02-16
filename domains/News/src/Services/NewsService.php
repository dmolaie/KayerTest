<?php


namespace Domains\News\Services;

use Domains\News\Repositories\NewsRepository;
use Domains\News\Services\Contracts\DTOs\DTOMakers\NewsInfoDTOMaker;
use Domains\News\Services\Contracts\DTOs\NewsCreateDTO;
use Domains\Role\Services\RoleServices;
use Domains\User\Entities\User;

class NewsService
{
    /**
     * @var NewsRepository
     */
    private $newsRepository;
    /**
     * @var RoleServices
     */
    private $roleServices;
    /**
     * @var NewsInfoDTOMaker
     */
    private $newsInfoDTOMaker;

    public function __construct(
        NewsRepository $newsRepository,
        RoleServices $roleServices,
        NewsInfoDTOMaker $newsInfoDTOMaker
)
    {

        $this->newsRepository = $newsRepository;
        $this->roleServices = $roleServices;
        $this->newsInfoDTOMaker = $newsInfoDTOMaker;
    }

    public function createNews(NewsCreateDTO $newsCreateDTO)
    {
        $newsCreateDTO->setStatus(
            $this->getNewsStatus($newsCreateDTO->getEditor())
        );
        $news = $this->newsRepository->create($newsCreateDTO);
        return $this->newsInfoDTOMaker->convert($news);

    }

    private function getNewsStatus(User $editor)
    {
        if ($this->roleServices->isAdminRole($editor->role_id)) {
            return config('news.news_accept_status');
        }
        return config('news.news_pending_status');
    }
}