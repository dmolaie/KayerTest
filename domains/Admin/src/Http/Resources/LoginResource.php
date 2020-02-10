<?php

namespace Domains\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LoginResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => (\Auth::user()->id) ? \Auth::user()->name : false,
            'national_code' =>  (\Auth::user()->id) ? \Auth::user()->national_code : false,
            'token' => ( $this['token']) ?  $this['token'] : false
        ];
    }
}
