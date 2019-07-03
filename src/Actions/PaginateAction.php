<?php

namespace Jestillore\Common\Actions;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class PaginateAction extends AbstractAction
{
    /**
     * Paginate action
     *
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function execute(array $params = []): LengthAwarePaginator
    {
        return $this->getQuery()->paginate();
    }
}
