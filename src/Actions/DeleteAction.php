<?php

namespace Jestillore\Common\Actions;

use Jestillore\Common\Models\BaseModel;

abstract class DeleteAction extends AbstractAction
{
    /**
     * Delete model
     *
     * @param BaseModel|int $model
     * @return bool
     * @throws \Exception
     */
    public function execute($model): bool
    {
        return $this->getModel($model)->delete();
    }
}
