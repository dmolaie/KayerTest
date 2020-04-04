<?php


namespace Domains\Attachment\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Domains\Article\Entities\Article;
use Domains\Attachment\Http\Presenters\AttachmentPresenter;
use Domains\Attachment\Http\Requests\AttachmenImageRequest;
use Domains\Attachment\Http\Requests\AttachmentDestroyRequest;
use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\User\Exceptions\ImageNotFoundErrorException;
use Symfony\Component\HttpFoundation\Response;

class AttachmentController extends EhdaBaseController
{

    /**
     * @var AttachmentServices
     */
    private $attachmentService;

    public function __construct(AttachmentServices $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }

    public function destroyImages(AttachmentDestroyRequest $request)
    {
        try {
             $this->attachmentService->destroyImages($request->image_id);
             return $this->response([],Response::HTTP_OK,trans('attachment::response.success_delete_image'));
        }catch (ImageNotFoundErrorException $exception) {
            return $this->response([],$exception->getCode(),$exception->getMessage());
        }
    }

    public function AttachImage(AttachmenImageRequest $request)
    {
        try {
            $image =  $this->attachmentService->uploadImages($request->attachImageDTO());
            return $this->response( $image->getPaths(),Response::HTTP_OK,trans('attachment::response.success_delete_image'));
        }catch (ImageNotFoundErrorException $exception) {
            return $this->response([],$exception->getCode(),$exception->getMessage());
        }
    }
}