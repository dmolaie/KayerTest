<?php


namespace Domains\Slider\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Slider\Exceptions\SliderNotFoundException;
use Domains\Slider\Http\Presenters\SliderInfoPresenter;
use Domains\Slider\Http\Presenters\SliderPaginateInfoPresenter;
use Domains\Slider\Http\Requests\ChangeSliderStatusRequest;
use Domains\Slider\Http\Requests\CreateSliderRequest;
use Domains\Slider\Http\Requests\EditSliderRequest;
use Domains\Slider\Http\Requests\SliderListForAdminRequest;
use Domains\Slider\Services\SliderService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class SliderController extends EhdaBaseController
{

    /**
     * @var SliderService
     */
    private $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function create(CreateSliderRequest $request, SliderInfoPresenter $sliderInfoPresenter)
    {

        $sliderCreateDTO = $request->createSliderCreateDTO();
        $sliderInfoDTO = $this->sliderService->createSlider($sliderCreateDTO);
        return $this->response(
            $sliderInfoPresenter->transform($sliderInfoDTO),
            Response::HTTP_CREATED,
            trans('slider::response.create_successful')
        );

    }

    public function edit(EditSliderRequest $request, SliderInfoPresenter $sliderInfoPresenter)
    {
        try {
            $sliderEditDTO = $request->createSliderEditDTO();
            $sliderInfoDTO = $this->sliderService->editSlider($sliderEditDTO);
            return $this->response(
                $sliderInfoPresenter->transform($sliderInfoDTO),
                Response::HTTP_OK,
                trans('slider::response.edit_successful')
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response([], Response::HTTP_NOT_FOUND,
                trans('slider::response.slider_not_found'));
        }

    }

    public function getListForAdmin(
        SliderListForAdminRequest $request,
        SliderPaginateInfoPresenter $sliderPaginateInfoPresenter
    ) {
        $userId = \Auth::id();
        $sliderPaginateInfoDTO = $this->sliderService->filterAdminSlider($request->createSliderFilterDTO(), $userId);
        return $this->response(
            $sliderPaginateInfoPresenter->transform($sliderPaginateInfoDTO),
            Response::HTTP_OK
        );
    }

    public function delete(int $sliderId)
    {
        try {
            $this->sliderService->destroySlider($sliderId);
            return $this->response([], Response::HTTP_OK, trans('slider::response.success_delete_slider'));
        } catch (SliderNotFoundException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        } catch (ModelNotFoundException $exception) {
            return $this->response([], Response::HTTP_NOT_FOUND,
                trans('slider::response.slider_not_found'));
        }
    }

    public function changeStatus(ChangeSliderStatusRequest $request, SliderInfoPresenter $sliderInfoPresenter)
    {
        try {
            $sliderInfoDTO = $this->sliderService->changeStatus(
                $request->slider_id,
                $request->status
            );
            return $this->response(
                $sliderInfoPresenter->transform($sliderInfoDTO),
                Response::HTTP_OK,
                trans('slider::response.edit_successful')
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('slider::response.slider_not_found')
            );
        }

    }

    public function getDetail(int $id, SliderInfoPresenter $sliderInfoPresenter)
    {
        try {
            $sliderInfoDTO = $this->sliderService->getSliderDetail($id);

            return $this->response(
                $sliderInfoPresenter->transform($sliderInfoDTO),
                Response::HTTP_OK
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('slider::response.slider_not_found')
            );
        }
    }
}