<?php


namespace Domains\Payment\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Domains\Payment\Http\Presenters\DonationInfoPresenter;
use Domains\Payment\Http\Requests\DonationRequest;
use Domains\Payment\Services\PaymentService;
use Illuminate\Http\Response;


class PaymentController extends EhdaBaseController
{

    /**
     * @var PaymentService
     */
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function donation(DonationRequest $request, DonationInfoPresenter $donationInfoPresenter)
    {
        $paymentInfoDTO = $this->paymentService->CreateDonation($request->createDonation());
        return $this->response(
            $donationInfoPresenter->transform($paymentInfoDTO),
            Response::HTTP_CREATED,
            trans('payment::response.create_successful')
        );
    }
}