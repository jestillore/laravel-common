<?php

namespace Jestillore\Common\Console\Generators;

class DeleteActionGenerator extends AbstractActionGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:action:delete {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate delete action.';

    /**
     * @var string
     */
    protected $type = 'Delete action';

    /**
     * @var string
     */
    protected $action = 'Delete';
}
