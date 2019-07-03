<?php

namespace Jestillore\Common\Console\Generators;

class ViewActionGenerator extends AbstractActionGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:action:view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate view action.';

    /**
     * @var string
     */
    protected $type = 'View action';

    /**
     * @var string
     */
    protected $action = 'View';
}
