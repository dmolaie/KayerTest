<?php


namespace Domains\News\Services;

use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\News\Entities\News;
use Domains\News\Repositories\NewsRepository;
use Domains\News\Services\Contracts\DTOs\DTOMakers\NewsInfoDTOMaker;
use Domains\News\Services\Contracts\DTOs\DTOMakers\PaginationDTO;
use Domains\News\Services\Contracts\DTOs\NewsBaseSaveDTO;
use Domains\News\Services\Contracts\DTOs\NewsCreateDTO;
use Domains\News\Services\Contracts\DTOs\NewsEditDTO;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\User\Entities\User;
use Domains\User\Services\UserRoleService;

/**
 * Class NewsService
 */
class NewsService
{
    /**
     * @var NewsRepository
     */
    private $newsRepository;
    /**
     * @var UserRoleService
     */
    private $userRoleService;
    /**
     * @var NewsInfoDTOMaker
     */
    private $newsInfoDTOMaker;
    /**
     * @var AttachmentServices
     */
    private $attachmentServices;
    /**
     * @var PaginationDTOMaker
     */
    private $paginationDTOMaker;


    /**
     * NewsService constructor.
     * @param NewsRepository $newsRepository
     * @param UserRoleService $userRoleService
     * @param NewsInfoDTOMaker $newsInfoDTOMaker
     * @param AttachmentServices $attachmentServices
     * @param PaginationDTOMaker $paginationDTOMaker
     */
    public function __construct(
        NewsRepository $newsRepository,
        UserRoleService $userRoleService,
        NewsInfoDTOMaker $newsInfoDTOMaker,
        AttachmentServices $attachmentServices,
        PaginationDTOMaker $paginationDTOMaker
    ) {

        $this->newsRepository = $newsRepository;
        $this->userRoleService = $userRoleService;
        $this->newsInfoDTOMaker = $newsInfoDTOMaker;
        $this->attachmentServices = $attachmentServices;
        $this->paginationDTOMaker = $paginationDTOMaker;
    }

    /**
     * @param NewsCreateDTO $newsCreateDTO
     * @return \Domains\News\Services\Contracts\DTOs\NewsInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    public function createNews(NewsCreateDTO $newsCreateDTO)
    {
        $newsCreateDTO->setStatus(
            $this->getNewsStatus($newsCreateDTO->getPublisher())
        );
        $news = $this->newsRepository->create($newsCreateDTO);
        $attachmentInfoDto = $this->addAttachmentForNews($news, $newsCreateDTO);
        return $this->newsInfoDTOMaker->convert($news, $attachmentInfoDto);

    }

    /**
     * @param User $publisher
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getNewsStatus(User $publisher)
    {
        if ($this->userRoleService->hasActiveAdminRole($publisher->id)) {
            return config('news.news_accept_status');
        }
        return config('news.news_pending_status');
    }

    /**
     * @param News $news
     * @param NewsBaseSaveDTO $newsBaseSaveDTO
     * @return AttachmentInfoDTO|null
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    private function addAttachmentForNews(News $news, NewsBaseSaveDTO $newsBaseSaveDTO): ?AttachmentInfoDTO
    {
        if (!$newsBaseSaveDTO->getAttachmentFiles()) {
            return null;
        }
        $attachmentDTO = new AttachmentDTO();
        $attachmentDTO->setEntityId($news->id)
            ->setEntityName(class_basename(News::class))
            ->setFiles($newsBaseSaveDTO->getAttachmentFiles());
        return $this->attachmentServices->uploadImages($attachmentDTO);
    }

    /**
     * @param NewsEditDTO $newsEditDTO
     * @return \Domains\News\Services\Contracts\DTOs\NewsInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    public function editNews(NewsEditDTO $newsEditDTO)
    {
        $newsEditDTO->setStatus(
            $this->getNewsStatus($newsEditDTO->getEditor())
        );
        $news = $this->newsRepository->editNews($newsEditDTO);
        $this->addAttachmentForNews($news, $newsEditDTO);
        $attachmentInfoDto = $this->getAttachmentInfoNews(class_basename(News::class), [$news->id]);
        $images = $attachmentInfoDto->getImages()[$news->id];
        return $this->newsInfoDTOMaker->convert($news, $images);
    }

    /**
     * @param string $entityName
     * @param array $newsIds
     * @return AttachmentGetInfoDTO|null
     */
    private function getAttachmentInfoNews(string $entityName, array $newsIds)
    {
        $attachmentGetInfoDTO = new AttachmentGetInfoDTO();

        if ($newsIds) {
            $attachmentGetInfoDTO->setEntityName($entityName)
                ->setEntityIds($newsIds);
            return $this->attachmentServices->getImagesByIds($attachmentGetInfoDTO);
        }
        return $attachmentGetInfoDTO;


    }

    /**
     * @param NewsFilterDTO $newsFilterDTO
     * @return PaginationDTOMaker
     */
    public function filterNews(NewsFilterDTO $newsFilterDTO): PaginationDTOMaker
    {
        $news = $this->newsRepository->filter($newsFilterDTO);
        $newsIds = collect($news->items())->keyBy('id')->keys()->toArray();
        $attachmentInfoDto = $this->getAttachmentInfoNews(class_basename(News::class), $newsIds);
        return $this->paginationDTOMaker->perform(
            $news,
            NewsInfoDTOMaker::class,
            $attachmentInfoDto
        );

    }
}