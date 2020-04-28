<?php


namespace Domains\Attachment\Repositories;


use App\Infrastructure\Repositories\BaseEloquentRepository;
use Domains\Attachment\Entities\Attachment;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;

class AttachmentRepository
{
    protected $entityName = Attachment::class;

    public function create(AttachmentDTO $attachmentDTO, $attachmentPath, $attachmentFileName)
    {
        $attachment = new $this->entityName;
        $attachment->class = $attachmentDTO->getEntityName();
        $attachment->reference_id = $attachmentDTO->getEntityId();
        $attachment->file_name = $attachmentFileName;
        $attachment->path = $attachmentPath;
        $attachment->save();
        return $attachment;
    }

    public function getAllFiles(string $entityName, int $entityId)
    {
        return $attachment = $this->entityName::where([
            ['reference_id', '=', $entityId],
            ['class', '=', $entityName]
        ])->get();
    }

    public function destroyImage(int $imageId)
    {
        return $this->entityName::where('id', '=', $imageId)->delete();
    }
}