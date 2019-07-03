<?php

namespace Jestillore\Common\Console\Generators;

class UpdateActionGenerator extends AbstractActionGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:action:update {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate update action.';

    /**
     * @var string
     */
    protected $type = 'Update action';

    /**
     * @var string
     */
    protected $action = 'Update';
}
