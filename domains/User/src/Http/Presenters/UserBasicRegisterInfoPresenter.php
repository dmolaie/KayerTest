<?php


namespace Domains\User\Http\Presenters;


class UserBasicRegisterInfoPresenter
{

    public function transform()
    {
        return [
            'education_degree'    => config('user.education_degree'),
            'field_of_activities' => config('user.field_of_activities'),
            'know_community_by'   => config('user.know_community_by')
        ];
    }


}