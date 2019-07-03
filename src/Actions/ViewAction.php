<?php

namespace Jestillore\Common\Actions;

use Jestillore\Common\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

abstract class ViewAction extends AbstractAction
{
    /**
     * View action
     *
     * @param int|string $key
     * @return BaseModel|Model
     */
    public function execute($key)
    {
        return $this->getQuery()->findOrFail($key);
    }
}
