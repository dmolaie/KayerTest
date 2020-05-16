<?php


namespace Domains\Arvanvod\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Domains\Arvanvod\Exceptions\ArvanvodNotFoundErrorException;
use Domains\Arvanvod\Exceptions\ArvanvodRepeatErrorException;
use Domains\Arvanvod\Http\Presenters\ArvanvodInfoPresenter;
use Domains\Arvanvod\Http\Presenters\EventInfoPresenter;
use Domains\Arvanvod\Http\Requests\CreateArvanvodRequest;
use Domains\Arvanvod\Http\Requests\DestroyArvanvodRequest;
use Domains\Arvanvod\Http\Requests\ListArvanvodRequest;
use Domains\Arvanvod\Services\ArvanvodService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class ArvanvodController extends EhdaBaseController
{
    /**
     * @var ArvanvodService
     */
    private $arvanvodService;

    public function __construct(ArvanvodService $arvanvodService)
    {
        $this->arvanvodService = $arvanvodService;
    }

    public function create(CreateArvanvodRequest $request, ArvanvodInfoPresenter $arvanvodInfoPresenter)
    {
        try {
            $arvanvodInfoDTO = $this->arvanvodService->createArvanvod($request->ArvanvodCreateDTO());
            return $this->response(
                $arvanvodInfoPresenter->transform($arvanvodInfoDTO),
                Response::HTTP_CREATED,
                trans('arvanvod::response.create_successful')
            );
        } catch (ArvanvodRepeatErrorException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }

    }

    public function getList(ListArvanvodRequest $request, ArvanvodInfoPresenter $arvanvodInfoPresenter)
    {
        try {
            $arvanvodInfoDTO = $this->arvanvodService->getList($request->ArvanvodListDTO());
            return $this->response(
                $arvanvodInfoPresenter->transform($arvanvodInfoDTO),
                Response::HTTP_OK
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('arvanvod::response.arvanvod_not_found')
            );
        }
    }

    public function delete(DestroyArvanvodRequest $request)
    {
        try {
            $this->arvanvodService->destroyArvanvod($request->getUserIdDTO());
            return $this->response([], Response::HTTP_OK, trans('arvanvod::response.success_delete_arvanvod'));
        } catch (ArvanvodNotFoundErrorException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        } catch (ModelNotFoundException $exception) {
            return $this->response([], Response::HTTP_NOT_FOUND,
                trans('arvavod::response.arvanvod_not_found'));
        }
    }
}