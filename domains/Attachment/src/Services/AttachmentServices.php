<?php

namespace Domains\Attachment\Services;


use Domains\Attachment\Repositories\AttachmentRepository;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
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
        foreach ($attachmentGetInfoDTO->getEntityIds() as $entityId) {
            $attachmentGetInfoDTO->addImages(
                $this->getAllFiles($attachmentGetInfoDTO->getEntityName(), $entityId),
                $entityId);
        }
        return $attachmentGetInfoDTO;
    }

    public function getAllFiles(string $entityName, int $entityId): AttachmentInfoDTO
    {
        $attachmentInfoDTO = new AttachmentInfoDTO();
        $attachmentInfoDTO->setEntityName($entityName);
        $attachmentInfoDTO->setEntityId($entityId);
        $attachmentEntity = $this->attachmentRepository->getAllFiles($entityName, $entityId);
        if ($attachmentEntity) {
            foreach ($attachmentEntity as $item) {
                $attachmentInfoDTO->addToPaths($item->id, $item->path);
            }
        }
        return $attachmentInfoDTO;
    }

    public function uploadFiles(AttachmentDTO $attachmentDTO)
    {
        $attachmentInfoDTO = new AttachmentInfoDTO();
        $attachmentInfoDTO->setEntityName($attachmentDTO->getEntityName());
        $attachmentInfoDTO->setEntityId($attachmentDTO->getEntityId());
        $type = $attachmentDTO->getEntityName();
        if (!$attachmentDTO->getFiles()) {
            throw new AttachmentFileErrorException(trans('attachment::response.attachment_file_not_exist'));
        }
        $basePath = config('attachment.base_path_storage');
        $path = $basePath . $type;
        foreach ($attachmentDTO->getFiles() as $file) {
            $fileName = date('mdYHis') . uniqid() . '-' . $file->getClientOriginalName();
            Storage::putFileAs($path . $this->separator, $file, date('mdYHis') . uniqid() . '-' . $file->getClientOriginalName());
            $imagePathFinal = $path . $this->separator . $fileName;
            $attachmentEntity = $this->attachmentRepository->create($attachmentDTO, $imagePathFinal, $fileName);
            $attachmentInfoDTO->addToPaths($attachmentEntity->id, $imagePathFinal);
        }
        return $attachmentInfoDTO;
    }

    public function getContentByIds(AttachmentGetInfoDTO $attachmentGetInfoDTO)
    {
        foreach ($attachmentGetInfoDTO->getEntityIds() as $entityId) {
            $attachmentGetInfoDTO->addFiles(
                $this->getAllFiles($attachmentGetInfoDTO->getEntityName(), $entityId),
                $entityId);
        }
        return $attachmentGetInfoDTO;
    }
}