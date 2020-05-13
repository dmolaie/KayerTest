<?php


namespace Domains\Slider\Services;

use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Slider\Entities\Slider;
use Domains\Slider\Exceptions\SliderNotFoundException;
use Domains\Slider\Repositories\SliderRepository;
use Domains\Slider\Services\Contracts\DTOs\DTOMakers\SliderInfoDTOMaker;
use Domains\Slider\Services\Contracts\DTOs\DTOMakers\PaginationDTO;
use Domains\Slider\Services\Contracts\DTOs\SliderBaseSaveDTO;
use Domains\Slider\Services\Contracts\DTOs\SliderCreateDTO;
use Domains\Slider\Services\Contracts\DTOs\SliderEditDTO;
use Domains\Slider\Services\Contracts\DTOs\SliderFilterDTO;
use Domains\Slider\Services\Contracts\DTOs\SliderInfoDTO;
use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\User\Entities\User;
use Domains\User\Services\UserService;

/**
 * Class SliderService
 */
class SliderService
{
    /**
     * @var SliderRepository
     */
    private $sliderRepository;
    /**
     * @var SliderInfoDTOMaker
     */
    private $sliderInfoDTOMaker;
    /**
     * @var AttachmentServices
     */
    private $attachmentServices;
    /**
     * @var PaginationDTOMaker
     */
    private $paginationDTOMaker;
    /**
     * @var UserService
     */
    private $userService;


    /**
     * SliderService constructor.
     * @param SliderRepository $sliderRepository
     * @param SliderInfoDTOMaker $sliderInfoDTOMaker
     * @param AttachmentServices $attachmentServices
     * @param PaginationDTOMaker $paginationDTOMaker
     * @param UserService $userService
     */
    public function __construct(
        SliderRepository $sliderRepository,
        SliderInfoDTOMaker $sliderInfoDTOMaker,
        AttachmentServices $attachmentServices,
        PaginationDTOMaker $paginationDTOMaker,
        UserService $userService
    )
    {

        $this->sliderRepository = $sliderRepository;
        $this->sliderInfoDTOMaker = $sliderInfoDTOMaker;
        $this->attachmentServices = $attachmentServices;
        $this->paginationDTOMaker = $paginationDTOMaker;
        $this->userService = $userService;
    }

    /**
     * @param SliderCreateDTO $sliderCreateDTO
     * @return \Domains\Slider\Services\Contracts\DTOs\SliderInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    public function createSlider(SliderCreateDTO $sliderCreateDTO)
    {
        $sliderCreateDTO->setStatus(
            $this->getSliderStatus(
                $sliderCreateDTO->getPublisher(),
                config('slider.slider_pending_status')
            ));
        $slider = $this->sliderRepository->create($sliderCreateDTO);
        $attachmentInfoDto = $this->addAttachmentForSlider($slider, $sliderCreateDTO);
        return $this->sliderInfoDTOMaker->convert($slider, $attachmentInfoDto);

    }

    /**
     * @param User $publisher
     * @param string $status
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getSliderStatus(User $publisher, string $status)
    {
        if ($status == config('slider.slider_pending_status') && $this->userService->isUserAdmin($publisher->id)) {
            return config('slider.slider_accept_status');
        }
        return $status;
    }

    /**
     * @param Slider $slider
     * @param SliderBaseSaveDTO $sliderBaseSaveDTO
     * @return AttachmentInfoDTO|null
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    private function addAttachmentForSlider(Slider $slider, SliderBaseSaveDTO $sliderBaseSaveDTO): ?AttachmentInfoDTO
    {
        if (!$sliderBaseSaveDTO->getAttachmentFiles()) {
            return null;
        }
        $attachmentDTO = new AttachmentDTO();
        $attachmentDTO->setEntityId($slider->id)
            ->setEntityName(class_basename(Slider::class))
            ->setFiles($sliderBaseSaveDTO->getAttachmentFiles());
        return $this->attachmentServices->uploadImages($attachmentDTO);
    }

    /**
     * @param SliderEditDTO $sliderEditDTO
     * @return \Domains\Slider\Services\Contracts\DTOs\SliderInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    public function editSlider(SliderEditDTO $sliderEditDTO)
    {
        $sliderEditDTO->setStatus(
            $this->getSliderStatus($sliderEditDTO->getEditor(),
                config('slider.slider_pending_status'))
        );
        $slider = $this->sliderRepository->editSlider($sliderEditDTO);
        $this->addAttachmentForSlider($slider, $sliderEditDTO);
        $attachmentInfoDto = $this->getAttachmentInfoSlider(class_basename(Slider::class), [$slider->id]);
        $images = $attachmentInfoDto->getImages()[$slider->id];
        return $this->sliderInfoDTOMaker->convert($slider, $images);
    }

    /**
     * @param string $entityName
     * @param array $sliderIds
     * @return AttachmentGetInfoDTO|null
     */
    private function getAttachmentInfoSlider(string $entityName, array $sliderIds)
    {
        $attachmentGetInfoDTO = new AttachmentGetInfoDTO();

        if ($sliderIds) {
            $attachmentGetInfoDTO->setEntityName($entityName)
                ->setEntityIds($sliderIds);
            return $this->attachmentServices->getImagesByIds($attachmentGetInfoDTO);
        }
        return $attachmentGetInfoDTO;


    }

    /**
     * @param SliderFilterDTO $sliderFilterDTO
     * @return PaginationDTOMaker
     */
    public function filterSlider(SliderFilterDTO $sliderFilterDTO): PaginationDTOMaker
    {
        $slider = $this->sliderRepository->filter($sliderFilterDTO);
        $sliderIds = collect($slider->items())->keyBy('id')->keys()->toArray();
        $attachmentInfoDto = $this->getAttachmentInfoSlider(class_basename(Slider::class), $sliderIds);
        return $this->paginationDTOMaker->perform(
            $slider,
            SliderInfoDTOMaker::class,
            $attachmentInfoDto
        );
    }

    public function destroySlider(int $sliderId)
    {
        $this->changeStatus($sliderId, config('slider.slider_delete_status'));
        $result = $this->sliderRepository->destroySlider($sliderId);
        if (!$result) {
            throw new SliderNotFoundException(trans('slider::response.slider_not_found'));
        }
        return $result;
    }

    public function changeStatus(int $sliderId, string $status)
    {
        $slider = $this->sliderRepository->changeStatus($sliderId, $status);
        $attachmentInfoDto = $this->getAttachmentInfoSlider(class_basename(Slider::class), [$slider->id]);
        $images = $attachmentInfoDto->getImages()[$slider->id];
        return $this->sliderInfoDTOMaker->convert($slider, $images);
    }

    public function getSliderDetail(int $id): SliderInfoDTO
    {
        $slider = $this->sliderRepository->findOrFail($id);
        $attachmentInfoDto = $this->getAttachmentInfoSlider(class_basename(Slider::class), [$slider->id]);
        $images = $attachmentInfoDto->getImages()[$slider->id];
        return $this->sliderInfoDTOMaker->convert($slider, $images);
    }

    public function getSliderDetailWithUuid(string $uuid)
    {
        $slider = $this->sliderRepository->findOrFailUuid($uuid);
        $attachmentInfoDto = $this->getAttachmentInfoSlider(class_basename(Slider::class), [$slider->id]);
        $images = $attachmentInfoDto->getImages()[$slider->id];
        return $this->sliderInfoDTOMaker->convert($slider, $images);
    }

    public function filterAdminSlider(SliderFilterDTO $sliderFilterDTO,int $userId)
    {
        $userProvinces = $this->userService->getProvinceIds($userId);
        if(!empty($userProvinces)){
            $sliderFilterDTO->setProvinceIds($userProvinces);
        }
        return $this->filterSlider($sliderFilterDTO);
    }
}