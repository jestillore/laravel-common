<?php

namespace Jestillore\Common\Console\Generators;

class PaginateActionGenerator extends AbstractActionGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:action:paginate {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate paginate action.';

    /**
     * @var string
     */
    protected $type = 'Paginate action';

    /**
     * @var string
     */
    protected $action = 'Paginate';

    /**
     * @var bool
     */
    protected $plural = true;
}
