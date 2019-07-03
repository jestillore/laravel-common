<?php

namespace Jestillore\Common\Console\Generators;

class CreateActionGenerator extends AbstractActionGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:action:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate create action.';

    /**
     * @var string
     */
    protected $type = 'Create action';

    /**
     * @var string
     */
    protected $action = 'Create';
}
