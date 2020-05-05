<?php

namespace Domains\Attachment\Services;


use Domains\Attachment\Repositories\AttachmentRepository;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\ContentDTO;
use Domains\Attachment\Services\Contracts\DTOs\ContentFileDTO;
use Domains\Attachment\Services\Contracts\DTOs\ContentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\ContentGetInfoFileDTO;
use Domains\User\Exceptions\AttachmentFileErrorException;
use Domains\User\Exceptions\ImageNotFoundErrorException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AttachmentServices
{
    protected $separator = DIRECTORY_SEPARATOR;
    /**
     * @var AttachmentRepository
     */
    private $attachmentRepository;


    public function __construct(AttachmentRepository $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
    }

    public function uploadImages(AttachmentDTO $attachmentDTO): AttachmentInfoDTO
    {
        if (!$attachmentDTO->getFiles()) {
            throw new AttachmentFileErrorException(trans('attachment::response.attachment_file_not_exist'));
        }
        $attachmentInfoDTO = new AttachmentInfoDTO();
        $attachmentInfoDTO->setEntityName($attachmentDTO->getEntityName());
        $attachmentInfoDTO->setEntityId($attachmentDTO->getEntityId());
        $attachmentDTO->setType(config('attachment.type.image-attachment'));
        $basePath = config('attachment.base_path');
        $imagePath = $basePath . $attachmentDTO->getEntityName();
        $sizeEntity = $this->getSizeEntity($attachmentDTO->getEntityName());
        if (!File::isDirectory($imagePath)) {
            File::makeDirectory($imagePath);
        }
        foreach ($attachmentDTO->getFiles() as $item) {
            $fileName = date('mdYHis') . uniqid() . '-' . $item->getClientOriginalName();
            Image::make($item)->resize($sizeEntity['normal_size']['width'],
                $sizeEntity['normal_size']['height'])->save($imagePath . $this->separator . $fileName);
            $imagePathFinal = $imagePath . $this->separator . $fileName;
            $attachmentEntity = $this->attachmentRepository->create($attachmentDTO, $imagePathFinal, $fileName);
            $attachmentInfoDTO->addToPaths($attachmentEntity->id, $imagePathFinal);
        }
        return $attachmentInfoDTO;
    }

    private function getSizeEntity(string $entityName)
    {
        return config('attachment.image_sizes')[$entityName] ?? config('attachment.image_sizes.default');
    }

    public function destroyImages(int $imageId)
    {
        $result = $this->attachmentRepository->destroyImage($imageId);
        if (!$result) {
            throw new ImageNotFoundErrorException(trans('attachment::response.image_not_found'));
        }
        return $result;
    }

    public function getImagesByIds(AttachmentGetInfoDTO $attachmentGetInfoDTO)
    {
        $type = config('attachment.type.image-attachment');
        foreach ($attachmentGetInfoDTO->getEntityIds() as $entityId) {
            $attachmentGetInfoDTO->addImages(
                $this->getAllImages($attachmentGetInfoDTO->getEntityName(), $entityId, $type),
                $entityId);
        }
        return $attachmentGetInfoDTO;
    }

    public function getAllImages(string $entityName, int $entityId, $type): AttachmentInfoDTO
    {
        $attachmentInfoDTO = new AttachmentInfoDTO();
        $attachmentInfoDTO->setEntityName($entityName);
        $attachmentInfoDTO->setEntityId($entityId);
        $attachmentEntity = $this->attachmentRepository->getAllFiles($entityName, $entityId, $type);
        if ($attachmentEntity) {
            foreach ($attachmentEntity as $item) {
                $attachmentInfoDTO->addToPaths($item->id, $item->path);
            }
        }
        return $attachmentInfoDTO;
    }

    public function uploadFiles(ContentDTO $contentDTO)
    {
        $contentGetInfoDTO = new ContentGetInfoDTO();
        $contentGetInfoDTO->setEntityName($contentDTO->getEntityName());
        $contentGetInfoDTO->setEntityId($contentDTO->getEntityId());
        $contentDTO->setType(config('attachment.type.' . strtolower($contentDTO->getEntityName()) . '-media'));
        $type = $contentDTO->getEntityName();
        if (!$contentDTO->getContentFileDTOs()) {
            throw new AttachmentFileErrorException(trans('attachment::response.attachment_file_not_exist'));
        }
        $basePath = config('attachment.base_path_storage');
        $pathUpload = config('attachment.path_storage');
        $path = $basePath . $type;
        foreach ($contentDTO->getContentFileDTOs() as $file) {
            $fileName = '';
            $imagePathFinal = '';
            $contentGetInfoFileDTO = new ContentGetInfoFileDTO();
            if ($file->getFile()) {
                $fileName = date('mdYHis') . uniqid() . '-' . $file->getFile()->getClientOriginalName();
                $fileNameUpload = Storage::putFileAs($path, $file->getFile(),
                    date('mdYHis') . uniqid() . '-' . $file->getFile()->getClientOriginalName());
                $url = explode('/', $fileNameUpload);
                $fileNameFinal = end($url);
                $imagePathFinal = $pathUpload . $type . $this->separator . $fileNameFinal;
                $contentGetInfoFileDTO->setPath($imagePathFinal);
            }
            $contentGetInfoFileDTO->setTitle($file->getTitle());
            $contentGetInfoFileDTO->setLink($file->getLink());
            $attachment = $this->attachmentRepository->create($contentDTO, $imagePathFinal, $fileName, $contentGetInfoFileDTO);
            $contentGetInfoFileDTO->setId($attachment->id);
            $contentGetInfoDTO->addContentGetInfoFileDTOs($contentGetInfoFileDTO);
        }
        return $contentGetInfoDTO;
    }

    public function getContentByIds(AttachmentGetInfoDTO $attachmentGetInfoDTO)
    {
        $result = [];
        $type = config('attachment.type.' . strtolower($attachmentGetInfoDTO->getEntityName() . '-media'));
        foreach ($attachmentGetInfoDTO->getEntityIds() as $entityId) {
            $contentGetInfoDTO = new ContentGetInfoDTO();
            $contentGetInfoDTO->setEntityName($attachmentGetInfoDTO->getEntityName())
                ->setEntityId($entityId)
                ->setContentGetInfoFileDTOs(
                    $this->getAllContent(
                        $attachmentGetInfoDTO->getEntityName(),
                        $entityId,
                        $type
                    )
                );
            $result[$entityId] = $contentGetInfoDTO;
        }
        return $result;
    }

    public function getAllContent(string $entityName, int $entityId, string $type)
    {

        $contentEntities = $this->attachmentRepository->getAllFiles($entityName, $entityId, $type);
        $contentGetInfoFileDTOs = [];
        foreach ($contentEntities as $contentEntity) {
            $contentGetInfoFileDTO = new ContentGetInfoFileDTO();
            $contentGetInfoFileDTO->setLink($contentEntity->link)
                ->setId($contentEntity->id)
                ->setTitle($contentEntity->title)
                ->setPath($contentEntity->path);
            $contentGetInfoFileDTOs[] = $contentGetInfoFileDTO;

        }
        return $contentGetInfoFileDTOs;
    }

    public function editFileData(ContentFileDTO $contentFileDTO)
    {
        return $this->attachmentRepository->editFileData($contentFileDTO);
    }
}