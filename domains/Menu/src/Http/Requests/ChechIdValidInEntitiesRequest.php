<?php


namespace Domains\Menu\Http\Requests;

use Domains\Article\Entities\Article;
use Domains\Category\Entities\Category;
use Illuminate\Contracts\Validation\Rule;

class ChechIdValidInEntitiesRequest implements Rule
{
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param $menuable_id
     * @param $id
     * @return bool
     */
    public function passes($menuable_id, $id)
    {
        $typeConfig = config('menus.menus_type');
        switch ($this->type) {
            case $typeConfig[1] :
                return Article::whereId($id)->exists();
            default :
                return Category::whereId($id)->exists();
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('menus::validation.error_id_not_valid');
    }
}