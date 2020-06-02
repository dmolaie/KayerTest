<?php


namespace Domains\User\Repositories;


use Carbon\Carbon;
use Domains\User\Entities\PasswordResetToken;
use Domains\User\Services\Contracts\DTOs\DTOMakers\ResetPasswordDTO;

class PasswordResetRepository
{
    protected $entityName = PasswordResetToken::class;

    public function create(string $nationalCode, string $mobile)
    {
        $passwordResetToken = new $this->entityName;
        $passwordResetToken->national_code =$nationalCode;
        $passwordResetToken->mobile = $mobile;
        $passwordResetToken->save();
        return $passwordResetToken;
    }

    public function findLessThanTwoMinuteToken(string $nationalCode)
    {
        return $this->entityName::where('national_code',$nationalCode)
            ->where('created_at','>=',Carbon::now()->subMinute(2))->first();

    }

    public function findNotExpireToken(ResetPasswordDTO $resetPasswordDTO)
    {
        return $this->entityName::where('national_code', $resetPasswordDTO->getNationalCode())
            ->where('mobile',$resetPasswordDTO->getMobile())
            ->where('token',$resetPasswordDTO->getToken())
            ->where('created_at', '>=', Carbon::now()->subMinute(2))->firstOrFail();
    }
}