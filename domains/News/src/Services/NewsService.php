<?php


namespace Domains\News\Services;

use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\News\Entities\News;
use Domains\News\Exceptions\NewsNotFoundException;
use Domains\News\Repositories\NewsRepository;
use Domains\News\Services\Contracts\DTOs\DTOMakers\NewsInfoDTOMaker;
use Domains\News\Services\Contracts\DTOs\DTOMakers\PaginationDTO;
use Domains\News\Services\Contracts\DTOs\NewsBaseSaveDTO;
use Domains\News\Services\Contracts\DTOs\NewsCreateDTO;
use Domains\News\Services\Contracts\DTOs\NewsEditDTO;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Domains\News\Services\Contracts\DTOs\NewsInfoDTO;
use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\User\Entities\User;
use Domains\User\Services\UserService;

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
     * @var UserService
     */
    private $userService;


    /**
     * NewsService constructor.
     * @param NewsRepository $newsRepository
     * @param NewsInfoDTOMaker $newsInfoDTOMaker
     * @param AttachmentServices $attachmentServices
     * @param PaginationDTOMaker $paginationDTOMaker
     * @param UserService $userService
     */
    public function __construct(
        NewsRepository $newsRepository,
        NewsInfoDTOMaker $newsInfoDTOMaker,
        AttachmentServices $attachmentServices,
        PaginationDTOMaker $paginationDTOMaker,
        UserService $userService
    )
    {

        $this->newsRepository = $newsRepository;
        $this->newsInfoDTOMaker = $newsInfoDTOMaker;
        $this->attachmentServices = $attachmentServices;
        $this->paginationDTOMaker = $paginationDTOMaker;
        $this->userService = $userService;
    }

    /**
     * @param NewsCreateDTO $newsCreateDTO
     * @return \Domains\News\Services\Contracts\DTOs\NewsInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    public function createNews(NewsCreateDTO $newsCreateDTO)
    {
        $newsCreateDTO->setStatus(
            $this->getNewsStatus(
                $newsCreateDTO->getPublisher(),
                config('news.news_pending_status')
            ));
        $news = $this->newsRepository->create($newsCreateDTO);
        $attachmentInfoDto = $this->addAttachmentForNews($news, $newsCreateDTO);
        return $this->newsInfoDTOMaker->convert($news, $attachmentInfoDto);

    }

    /**
     * @param User $publisher
     * @param string $status
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getNewsStatus(User $publisher, string $status)
    {
        if ($status == config('news.news_pending_status') && $this->userService->isUserAdmin($publisher->id)) {
            return config('news.news_accept_status');
        }
        return $status;
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
            $this->getNewsStatus($newsEditDTO->getEditor(),
                config('news.news_pending_status'))
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

    public function destroyNews(int $newsId)
    {
        $this->changeStatus($newsId, config('news.news_delete_status'));
        $result = $this->newsRepository->destroyNews($newsId);
        if (!$result) {
            throw new NewsNotFoundException(trans('news::response.news_not_found'));
        }
        return $result;
    }

    public function changeStatus(int $newsId, string $status)
    {
        $news = $this->newsRepository->changeStatus($newsId, $status);
        $attachmentInfoDto = $this->getAttachmentInfoNews(class_basename(News::class), [$news->id]);
        $images = $attachmentInfoDto->getImages()[$news->id];
        return $this->newsInfoDTOMaker->convert($news, $images);
    }

    public function getNewsDetail(int $id): NewsInfoDTO
    {
        $news = $this->newsRepository->findOrFail($id);
        $attachmentInfoDto = $this->getAttachmentInfoNews(class_basename(News::class), [$news->id]);
        $images = $attachmentInfoDto->getImages()[$news->id];
        return $this->newsInfoDTOMaker->convert($news, $images);
    }

    public function getNewsDetailWithSlug(string $slug)
    {
        $news = $this->newsRepository->findOrFailSlug($slug);
        $attachmentInfoDto = $this->getAttachmentInfoNews(class_basename(News::class), [$news->id]);
        $images = $attachmentInfoDto->getImages()[$news->id];
        return $this->newsInfoDTOMaker->convert($news, $images);
    }

    public function getNewsDetailWithUuid(string $uuid)
    {
        $news = $this->newsRepository->findOrFailUuid($uuid);
        $attachmentInfoDto = $this->getAttachmentInfoNews(class_basename(News::class), [$news->id]);
        $images = $attachmentInfoDto->getImages()[$news->id];
        return $this->newsInfoDTOMaker->convert($news, $images);
    }
}