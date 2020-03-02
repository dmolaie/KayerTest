<?php


namespace Domains\Article\Services;

use Domains\Article\Exceptions\ArticleNotFoundException;
use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Article\Entities\Article;
use Domains\Article\Repositories\ArticleRepository;
use Domains\Article\Services\Contracts\DTOs\DTOMakers\ArticleInfoDTOMaker;
use Domains\Article\Services\Contracts\DTOs\DTOMakers\PaginationDTO;
use Domains\Article\Services\Contracts\DTOs\ArticleBaseSaveDTO;
use Domains\Article\Services\Contracts\DTOs\ArticleCreateDTO;
use Domains\Article\Services\Contracts\DTOs\ArticleEditDTO;
use Domains\Article\Services\Contracts\DTOs\ArticleFilterDTO;
use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\User\Entities\User;
use Domains\User\Services\UserService;

/**
 * Class ArticleService
 */
class ArticleService
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;
    /**
     * @var ArticleInfoDTOMaker
     */
    private $articleInfoDTOMaker;
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
     * ArticleService constructor.
     * @param ArticleRepository $articleRepository
     * @param ArticleInfoDTOMaker $articleInfoDTOMaker
     * @param AttachmentServices $attachmentServices
     * @param PaginationDTOMaker $paginationDTOMaker
     * @param UserService $userService
     */
    public function __construct(
        ArticleRepository $articleRepository,
        ArticleInfoDTOMaker $articleInfoDTOMaker,
        AttachmentServices $attachmentServices,
        PaginationDTOMaker $paginationDTOMaker,
        UserService $userService
    ) {

        $this->articleRepository = $articleRepository;
        $this->articleInfoDTOMaker = $articleInfoDTOMaker;
        $this->attachmentServices = $attachmentServices;
        $this->paginationDTOMaker = $paginationDTOMaker;
        $this->userService = $userService;
    }

    /**
     * @param ArticleCreateDTO $articleCreateDTO
     * @return \Domains\Article\Services\Contracts\DTOs\ArticleInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    public function createArticle(ArticleCreateDTO $articleCreateDTO)
    {
        $articleCreateDTO->setStatus(
            $this->getArticleStatus($articleCreateDTO->getPublisher())
        );
        $article = $this->articleRepository->create($articleCreateDTO);
        $attachmentInfoDto = $this->addAttachmentForArticle($article, $articleCreateDTO);
        return $this->articleInfoDTOMaker->convert($article, $attachmentInfoDto);

    }

    /**
     * @param User $publisher
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getArticleStatus(User $publisher)
    {
        if ($this->userService->isUserAdmin($publisher->id)) {
            return config('article.article_accept_status');
        }
        return config('article.article_pending_status');
    }

    /**
     * @param Article $article
     * @param ArticleBaseSaveDTO $articleBaseSaveDTO
     * @return AttachmentInfoDTO|null
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    private function addAttachmentForArticle(Article $article, ArticleBaseSaveDTO $articleBaseSaveDTO): ?AttachmentInfoDTO
    {
        if (!$articleBaseSaveDTO->getAttachmentFiles()) {
            return null;
        }
        $attachmentDTO = new AttachmentDTO();
        $attachmentDTO->setEntityId($article->id)
            ->setEntityName(class_basename(Article::class))
            ->setFiles($articleBaseSaveDTO->getAttachmentFiles());
        return $this->attachmentServices->uploadImages($attachmentDTO);
    }

    /**
     * @param ArticleEditDTO $articleEditDTO
     * @return \Domains\Article\Services\Contracts\DTOs\ArticleInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    public function editArticle(ArticleEditDTO $articleEditDTO)
    {
        $articleEditDTO->setStatus(
            $this->getArticleStatus($articleEditDTO->getEditor())
        );

        $article = $this->articleRepository->editArticle($articleEditDTO);
        $this->addAttachmentForArticle($article, $articleEditDTO);
        $attachmentInfoDto = $this->getAttachmentInfoArticle(class_basename(Article::class), [$article->id]);
        $images = $attachmentInfoDto->getImages()[$article->id];
        return $this->articleInfoDTOMaker->convert($article, $images);
    }

    /**
     * @param string $entityName
     * @param array $articleIds
     * @return AttachmentGetInfoDTO|null
     */
    private function getAttachmentInfoArticle(string $entityName, array $articleIds)
    {
        $attachmentGetInfoDTO = new AttachmentGetInfoDTO();

        if ($articleIds) {
            $attachmentGetInfoDTO->setEntityName($entityName)
                ->setEntityIds($articleIds);
            return $this->attachmentServices->getImagesByIds($attachmentGetInfoDTO);
        }
        return $attachmentGetInfoDTO;
    }

    /**
     * @param ArticleFilterDTO $articleFilterDTO
     * @return PaginationDTOMaker
     */
    public function filterArticle(ArticleFilterDTO $articleFilterDTO): PaginationDTOMaker
    {
        $article = $this->articleRepository->filter($articleFilterDTO);
        $articleIds = collect($article->items())->keyBy('id')->keys()->toArray();
        $attachmentInfoDto = $this->getAttachmentInfoArticle(class_basename(Article::class), $articleIds);
        return $this->paginationDTOMaker->perform(
            $article,
            ArticleInfoDTOMaker::class,
            $attachmentInfoDto
        );

    }

    public function destroyArticle($articleId)
    {
        $result = $this->articleRepository->destroyArticle($articleId);
        if (!$result) {
            throw new ArticleNotFoundException(trans('article::response.article_not_found'));
        }
        return $result;

    }
}