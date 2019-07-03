<?php

namespace Jestillore\Common\Console\Generators;

class ListActionGenerator extends AbstractActionGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:action:list {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate list action.';

    /**
     * @var string
     */
    protected $type = 'List action';

    /**
     * @var string
     */
    protected $action = 'List';

    /**
     * @var bool
     */
    protected $plural = true;
}
