<?php

namespace Domains\Attachment\Services;


use Carbon\Carbon;
use Domains\Attachment\Repositories\AttachmentRepository;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\User\Entities\User;
use Domains\User\Exceptions\AttachmentFileErrorException;
use Illuminate\Support\Facades\Config;
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
        $imagePath = public_path($basePath . $attachmentDTO->getEntityName());
        $sizeEntity = config('attachment.image_sizes')[$attachmentDTO->getEntityName()];
        if (!File::isDirectory($imagePath)) {
            mkdir($imagePath);
        }
        foreach ($attachmentDTO->getFiles() as $item) {
            $fileName = date('mdYHis') . uniqid() . '-' . $item->getClientOriginalName();
            Image::make($item)->resize($sizeEntity['normal_size']['width'], $sizeEntity['normal_size']['height'])->save($imagePath . $this->separator . $fileName);
            $imagePathFinal = $imagePath . $this->separator . $fileName;
            $attachmentEntity = $this->attachmentRepository->create($attachmentDTO,$imagePathFinal,$fileName);
            $attachmentInfoDTO->addToPaths($attachmentEntity->id , $imagePathFinal);
        }
        return $attachmentInfoDTO;
    }
}