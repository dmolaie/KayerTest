<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\User\Services\Contracts\DTOs\UsersRegisterReportDTO;

class UserReportRequest extends EhdaBaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_client' => 'bool|required_if:type_legate,==,'.null,
            'type_legate' => 'bool|required_if:type_client,==,'.null,
            'register_from_client' => 'string',
            'register_end_client' => 'string',
            'status_client' => 'string',
            'register_from_legate' => 'string',
            'register_end_legate' => 'string',
            'status_legate' => 'string',
        ];
    }

    public function messages()
    {
        return trans('user::validation');
    }

    public function attributes()
    {
        return trans('user::validation.attributes');
    }

    public function getReportUserRegister(): UsersRegisterReportDTO
    {
        $userRegisterReportDTO = new UsersRegisterReportDTO();
        $userRegisterReportDTO->setRegisterFromClient($this->register_from_client ? Carbon::createFromTimestamp($this->register_from_client) : '')
            ->setRegisterEndClient($this->register_end_client ? Carbon::createFromTimestamp($this->register_end_client) : '')
            ->setRegisterFromLegate($this->register_from_legate ? Carbon::createFromTimestamp($this->register_from_legate) : '')
            ->setRegisterEndLegate($this->register_end_legate ? Carbon::createFromTimestamp($this->register_end_legate) : '')
            ->setStatusClient($this->status_client ? $this->status_client : '')
            ->setStatusLegate($this->status_legate ? $this->status_legate : '')
            ->setTypeClient($this->type_client ? $this->type_client : false)
            ->setTypeLegate($this->type_legate ? $this->type_legate : false)
            ->setSort('DESC')
            ->setPaginate('10');
        return $userRegisterReportDTO;
    }
}
