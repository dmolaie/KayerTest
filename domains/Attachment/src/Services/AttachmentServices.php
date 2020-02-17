<?php

namespace Domains\Attachment\Services;


use Domains\Attachment\Repositories\AttachmentRepository;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentBaseDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\User\Exceptions\AttachmentFileErrorException;
use Domains\User\Exceptions\ImageNotFoundErrorException;
use Illuminate\Support\Facades\File;
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
        $sizeEntity = config('attachment.image_sizes')[$attachmentDTO->getEntityName()];
        if (!File::isDirectory($imagePath)) {
            File::makeDirectory($imagePath);
        }
        foreach ($attachmentDTO->getFiles() as $item) {
            $fileName = date('mdYHis') . uniqid() . '-' . $item->getClientOriginalName();
            Image::make($item)->resize($sizeEntity['normal_size']['width'], $sizeEntity['normal_size']['height'])->save($imagePath . $this->separator . $fileName);
            $imagePathFinal = $imagePath . $this->separator . $fileName;
            $attachmentEntity = $this->attachmentRepository->create($attachmentDTO, $imagePathFinal, $fileName);
            $attachmentInfoDTO->addToPaths($attachmentEntity->id, $imagePathFinal);
        }
        return $attachmentInfoDTO;
    }

    public function getAllImages(AttachmentBaseDTO $attachmentBaseDTO): AttachmentInfoDTO
    {
        $attachmentInfoDTO = new AttachmentInfoDTO();
        $attachmentInfoDTO->setEntityName($attachmentBaseDTO->getEntityName());
        $attachmentInfoDTO->setEntityId($attachmentBaseDTO->getEntityId());
        $attachmentEntity = $this->attachmentRepository->getAllImages($attachmentBaseDTO);
        if ($attachmentEntity) {
            foreach ($attachmentEntity as $item) {
                $attachmentInfoDTO->addToPaths($item->id, $item->path);
            }
        }
        return $attachmentInfoDTO;
    }

    public function destroyImages(int $imageId)
    {
        $resualt = $this->attachmentRepository->destroyImage($imageId);
        if (!$resualt) {
            throw new ImageNotFoundErrorException(trans('attachment::response.image_not_found'));
        }
        return $resualt;
    }
}