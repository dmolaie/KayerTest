<?php

namespace Domains\Attachment\Http\Presenters;

use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\ContentFileDTO;

class FilePresenter
{
    protected $contentFileDTO;

    /**
     * LoginPresenter constructor.
     * @param ContentFileDTO $contentFileDTO
     */
    public function __construct(ContentFileDTO $contentFileDTO)
    {
        $this->contentFileDTO = $contentFileDTO;
    }

    /**
     * @param array $contentFile
     * @return array
     */
    public function transformMany(array $contentFile): array
    {
        return array_map(function ($contentFile) {
            return $this->transform($contentFile);
        }, $contentFile);
    }

    /**
     * @param ContentFileDTO $contentFileDTO
     * @return array
     */
    public function transform(ContentFileDTO $contentFileDTO)
    {
        return [
            'file_id' => $contentFileDTO->getId(),
            'title' => $contentFileDTO->getTitle(),
            'link' => $contentFileDTO->getLink(),
            ];
    }
}