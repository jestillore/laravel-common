<?php

namespace Jestillore\Common\Actions;

use Illuminate\Database\Eloquent\Collection;

abstract class ListAction extends AbstractAction
{
    /**
     * List action
     *
     * @param array $params
     * @return Collection
     */
    public function execute(array $params = []): Collection
    {
        return $this->getQuery()->get();
    }
}
