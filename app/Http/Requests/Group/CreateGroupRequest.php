<?php

namespace App\Http\Requests\Group;

use App\Http\Requests\KayerBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends KayerBaseRequest
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
            'name' => "required|string|max:200",
            'title' => "required|string|max:200",
            'description' => "string",
            'count_products' => "integer"
        ];
    }
}
