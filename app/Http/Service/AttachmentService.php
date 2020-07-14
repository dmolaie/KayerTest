<?php


namespace App\Http\Service;


use App\Exceptions\AttachmentFileErrorException;
use Illuminate\Support\Facades\Storage;

class AttachmentService
{
    protected $separator = DIRECTORY_SEPARATOR;

    public function uploadImages($file)
    {
        $file = $file['image'];
        if (!isset($file)) {
            throw new AttachmentFileErrorException(trans('attachment.attachment_file_not_exist'));
        }
        $basePath = config('attachment.image_base_path_storage');
        $basePathImage = config('attachment.image_path_storage');
        $imagePath = $basePath;
        $fileName = date('mdYHis') . uniqid() . '-' . $file->getClientOriginalName();
        $fileNameUpload = Storage::putFileAs($imagePath, $file,
            date('mdYHis') . uniqid() . '-' . $file->getClientOriginalName());
        $url = explode('/', $fileNameUpload);
        $fileNameFinal = end($url);
        $imagePathFinal = $basePathImage . $this->separator . $fileNameFinal;
        return $imagePathFinal;
    }

}