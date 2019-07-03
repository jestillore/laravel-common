<?php

namespace Jestillore\Common\Actions;

use Jestillore\Common\Models\BaseModel;

abstract class UpdateAction extends AbstractAction
{
    /**
     * Update model
     *
     * @param BaseModel|int $model
     * @param array $data
     * @return BaseModel
     */
    public function execute($model, array $data = [])
    {
        return tap($this->getModel($model), function (BaseModel $model) use ($data) {
            $model->update($data);
        });
    }
}
