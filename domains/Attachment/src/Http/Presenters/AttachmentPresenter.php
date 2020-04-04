<?php

namespace Domains\Attachment\Http\Presenters;

use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;

class AttachmentPresenter
{
    protected $attachmentDTO;

    /**
     * LoginPresenter constructor.
     * @param AttachmentDTO $attachmentDTO
     */
    public function __construct(AttachmentDTO $attachmentDTO)
    {
        $this->attachmentDTO = $attachmentDTO;
    }

    /**
     * @param array $attachmentFile
     * @return array
     */
    public function transformMany(array $attachmentFile): array
    {
        return array_map(function ($attachmentFile) {
            return $this->transform($attachmentFile);
        }, $attachmentFile);
    }

    /**
     * @param AttachmentInfoDTO $attachmentInfoDTO
     * @return array
     */
    public function transform(AttachmentInfoDTO $attachmentInfoDTO)
    {
        return [
            'image_path' => $attachmentInfoDTO->getPaths(),
            ];
    }
}