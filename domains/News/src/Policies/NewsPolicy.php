<?php

namespace Domains\News\Policies;

use Domains\News\Entities\News;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;


    public function before($user)
    {
        $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('type')->toArray();
        if (in_array(config('role.roles.admin.name'), $roleActiveUser)) {
            return true;
        }
    }

    public function create($user)
    {
        $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('type')->toArray();
        if (in_array(config('role.roles.admin.name'), $roleActiveUser) || in_array(config('role.roles.legate.name'), $roleActiveUser)) {
            return true;
        }
        return $this->deny(trans('user::response.authenticate.user_cant_access'), 403);
    }

    public function getListForAdmin($user)
    {
        $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('type')->toArray();
        if (in_array(config('role.roles.admin.name'), $roleActiveUser) || in_array(config('role.roles.legate.name'), $roleActiveUser)) {
            return true;
        }
        return $this->deny(trans('user::response.authenticate.user_cant_access'), 403);
    }

    public function getDetail($user)
    {
        $newsId = request()->segment(count(request()->segments()));
        $publiserId = News::where('id', '=', $newsId)->first('publisher_id');
        $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('type')->toArray();
        if (in_array(config('role.roles.legate.name'), $roleActiveUser) && $publiserId->publisher_id == auth()->user()->id) {
            return true;
        }
        return $this->deny(trans('user::response.authenticate.user_cant_access'), 403);
    }

    public function changeStatus($user)
    {
        $newsId = request()->input('news_id');
        $publiserId = News::where('id', '=', $newsId)->first('publisher_id');
        $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('type')->toArray();
        if (in_array(config('role.roles.legate.name'), $roleActiveUser) && $publiserId->publisher_id == auth()->user()->id) {
            return true;
        }
        return $this->deny(trans('user::response.authenticate.user_cant_access'), 403);
    }

    public function edit($user)
    {
        $newsId = request()->input('news_id');
        $publiserId = News::where('id', '=', $newsId)->first('publisher_id');
        $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('type')->toArray();
        if (in_array(config('role.roles.legate.name'), $roleActiveUser) && $publiserId->publisher_id == auth()->user()->id) {
            return true;
        }
        return $this->deny(trans('user::response.authenticate.user_cant_access'), 403);
    }

    public function delete($user)
    {
        $newsId = request()->segment(count(request()->segments()));
        $publiserId = News::where('id', '=', $newsId)->first('publisher_id');
        $roleActiveUser = $user->roles()->wherePivot('status', '=', config('user.user_role_active_status'))->pluck('type')->toArray();
        if (in_array(config('role.roles.legate.name'), $roleActiveUser) && $publiserId->publisher_id == auth()->user()->id) {
            return true;
        }
        return $this->deny(trans('user::response.authenticate.user_cant_access'), 403);
    }
}