<?php


namespace Domains\Attachment\Repositories;


use App\Infrastructure\Repositories\BaseEloquentRepository;
use Domains\Attachment\Entities\Attachment;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;

class AttachmentRepository
{
    protected $entityName = Attachment::class;

    public function create($content, $attachmentPath, $attachmentFileName,$contentGetInfoFileDTO = null)
    {
        $attachment = new $this->entityName;
        $attachment->class = $content->getEntityName();
        $attachment->reference_id = $content->getEntityId();
        $attachment->file_name = $attachmentFileName;
        $attachment->path = $attachmentPath;
        $attachment->type = $content->getType();
        if($contentGetInfoFileDTO){
            $attachment->link = $contentGetInfoFileDTO->getLink();
            $attachment->title = $contentGetInfoFileDTO->getTitle();
        }
        $attachment->save();
        return $attachment;
    }

    public function getAllFiles(string $entityName, int $entityId,string $type)
    {
        return $attachment = $this->entityName::where([
            ['reference_id', '=', $entityId],
            ['class', '=', $entityName],
            ['type' ,'=',$type]
        ])->get();
    }

    public function destroyImage(int $imageId)
    {
        return $this->entityName::where('id', '=', $imageId)->delete();
    }
}