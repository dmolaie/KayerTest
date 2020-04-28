<?php

namespace Domains\Attachment\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;

class AttachmenImageRequest extends EhdaBaseRequest
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
            'images.*' => 'max:1000000',

        ];
    }

    public function messages()
    {
        return trans('attachment::validation');
    }


    public function attributes()
    {
        return trans('attachment::validation.attributes');
    }


    public function attachImageDTO(): AttachmentDTO
    {
        $attachmentDTO = new AttachmentDTO();
        $attachmentDTO->setFiles($this['images']);
        $attachmentDTO->setEntityId(0);
        $attachmentDTO->setEntityName('');
        return $attachmentDTO;
    }

}
