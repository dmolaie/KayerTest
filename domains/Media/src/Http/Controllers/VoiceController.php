<?php


namespace Domains\Media\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Media\Exceptions\MediaNotFoundException;
use Domains\Media\Http\Presenters\MediaInfoPresenter;
use Domains\Media\Http\Presenters\MediaPaginateInfoPresenter;
use Domains\Media\Http\Requests\Voice\VoiceListForAdminRequest;
use Domains\Media\Http\Requests\Voice\ChangeVoiceStatusRequest;
use Domains\Media\Http\Requests\Voice\CreateVoiceRequest;
use Domains\Media\Http\Requests\Voice\EditVoiceRequest;
use Domains\Media\Services\MediaService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class VoiceController extends EhdaBaseController
{

    /**
     * @var MediaService
     */
    private $mediaService;

    public function __construct(MediaService $mediaService)
    {

        $this->mediaService = $mediaService;
    }

    public function create(CreateVoiceRequest $request, MediaInfoPresenter $mediaInfoPresenter)
    {

        $mediaCreateDTO = $request->createMediaCreateDTO();
        $mediaInfoDTO = $this->mediaService->createMedia($mediaCreateDTO);
        return $this->response(
            $mediaInfoPresenter->transform($mediaInfoDTO),
            Response::HTTP_CREATED,
            trans('media::response.create_successful')
        );

    }

    public function edit(EditVoiceRequest $request, MediaInfoPresenter $mediaInfoPresenter)
    {
        try{
            $mediaEditDTO = $request->createMediaEditDTO();
            $mediaInfoDTO = $this->mediaService->editMedia($mediaEditDTO);
            return $this->response(
                $mediaInfoPresenter->transform($mediaInfoDTO),
                Response::HTTP_OK,
                trans('media::response.edit_successful')
            );
        }catch (ModelNotFoundException $exception){
            return $this->response([], Response::HTTP_NOT_FOUND,
                trans('media::response.media_not_found'));
        }

    }

    public function getListForAdmin(
        VoiceListForAdminRequest $request,
        MediaPaginateInfoPresenter $mediaPaginateInfoPresenter
    ) {
        $mediaPaginateInfoDTO = $this->mediaService->filterMedia($request->createMediaFilterDTO());
        return $this->response(
            $mediaPaginateInfoPresenter->transform($mediaPaginateInfoDTO),
            Response::HTTP_OK
        );
    }

    public function delete(int $mediaId)
    {
        try {
            $this->mediaService->destroyMedia($mediaId);
            return $this->response([], Response::HTTP_OK, trans('media::response.success_delete_media'));
        } catch (MediaNotFoundException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        } catch (ModelNotFoundException $exception) {
            return $this->response([], Response::HTTP_NOT_FOUND,
                trans('media::response.media_not_found'));
        }
    }

    public function changeStatus(ChangeVoiceStatusRequest $request, MediaInfoPresenter $mediaInfoPresenter)
    {
        try {
            $mediaInfoDTO = $this->mediaService->changeStatus(
                $request->media_id,
                $request->status
            );

            return $this->response(
                $mediaInfoPresenter->transform($mediaInfoDTO),
                Response::HTTP_OK,
                trans('media::response.edit_successful')
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('media::response.media_not_found')
            );
        }

    }

    public function getDetail(int $id, MediaInfoPresenter $mediaInfoPresenter)
    {
        try {
            $mediaInfoDTO = $this->mediaService->getMediaDetail($id);

            return $this->response(
                $mediaInfoPresenter->transform($mediaInfoDTO),
                Response::HTTP_OK
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('media::response.media_not_found')
            );
        }
    }
}