<?php

namespace Domains\Attachment\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Attachment\Services\Contracts\DTOs\ContentFileDTO;

class EditFileDataRequest extends EhdaBaseRequest
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
            'file_id' => 'required|integer|exists:attachments,id',
            'title'   => 'string',
            'link'    => 'string',
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

    public function editDataFileDTO(): ContentFileDTO
    {
        $contentDTO = new ContentFileDTO();
        $contentDTO->setId($this->file_id);
        $contentDTO->setTitle($this->title);
        $contentDTO->setLink($this->link);
        return $contentDTO;
    }

}
