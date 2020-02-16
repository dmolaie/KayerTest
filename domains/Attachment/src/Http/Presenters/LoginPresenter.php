<?php

namespace Domains\Admin\Http\Presenters;

use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;

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
     * @return array
     */
    public function transformMany(): array
    {
    }

    /**
     * @param AttachmentDTO $attachmentDTO
     * @return void
     */
    public function transform(AttachmentDTO $attachmentDTO)
    {
    }
}