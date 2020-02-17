<?php


namespace Domains\News\Services;

use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\News\Entities\News;
use Domains\News\Repositories\NewsRepository;
use Domains\News\Services\Contracts\DTOs\DTOMakers\NewsInfoDTOMaker;
use Domains\News\Services\Contracts\DTOs\NewsBaseSaveDTO;
use Domains\News\Services\Contracts\DTOs\NewsCreateDTO;
use Domains\News\Services\Contracts\DTOs\NewsEditDTO;
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
    /**
     * @var AttachmentServices
     */
    private $attachmentServices;

    public function __construct(
        NewsRepository $newsRepository,
        RoleServices $roleServices,
        NewsInfoDTOMaker $newsInfoDTOMaker,
        AttachmentServices $attachmentServices
    ) {

        $this->newsRepository = $newsRepository;
        $this->roleServices = $roleServices;
        $this->newsInfoDTOMaker = $newsInfoDTOMaker;
        $this->attachmentServices = $attachmentServices;
    }

    public function createNews(NewsCreateDTO $newsCreateDTO)
    {
        $newsCreateDTO->setStatus(
            $this->getNewsStatus($newsCreateDTO->getPublisher())
        );
        $news = $this->newsRepository->create($newsCreateDTO);
        $attachmentInfoDto = $this->addAttachmentForNews($news, $newsCreateDTO);
        return $this->newsInfoDTOMaker->convert($news, $attachmentInfoDto);

    }

    private function getNewsStatus(User $publisher)
    {
        if ($this->roleServices->isAdminRole($publisher->role_id)) {
            return config('news.news_accept_status');
        }
        return config('news.news_pending_status');
    }

    private function addAttachmentForNews(News $news, NewsBaseSaveDTO $newsBaseSaveDTO): ?AttachmentInfoDTO
    {
        if (!$newsBaseSaveDTO->getAttachmentFiles()) {
            return null;
        }
        $attachmentDTO = new AttachmentDTO();
        $attachmentDTO->setEntityId($news->id)
            ->setEntityName(class_basename(News::class))
            ->setFile($newsBaseSaveDTO->getAttachmentFiles());
        return $this->attachmentServices->uploadImages($attachmentDTO);
    }

    public function editNews(NewsEditDTO $newsEditDTO)
    {
        $newsEditDTO->setStatus(
            $this->getNewsStatus($newsEditDTO->getEditor())
        );
        $news = $this->newsRepository->editNews($newsEditDTO);
        $attachmentInfoDto = $this->addAttachmentForNews($news, $newsEditDTO);
        return $this->newsInfoDTOMaker->convert($news, $attachmentInfoDto);
    }
}