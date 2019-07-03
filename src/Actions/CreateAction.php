<?php

namespace Jestillore\Common\Actions;

use Jestillore\Common\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

abstract class CreateAction extends AbstractAction
{
    /**
     * Create model
     *
     * @param array $data
     * @return BaseModel|Model
     */
    public function execute(array $data = [])
    {
        return $this->getQuery()->create($data);
    }
}
