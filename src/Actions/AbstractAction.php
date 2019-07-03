<?php

namespace Jestillore\Common\Actions;

use Jestillore\Common\Models\BaseModel;

abstract class AbstractAction
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    abstract protected function getQuery();

    /**
     * Get model
     *
     * @param $model
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    protected function getModel($model)
    {
        if (!$model instanceof BaseModel) {
            $model = $this->getQuery()->findOrFail($model);
        }
        return $model;
    }
}
