<?php

namespace Jestillore\Common\Console\Generators;

class CreateActionTestGenerator extends AbstractTestGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:action:create:test {name} {--unit}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create action test.';

    /**
     * @var string
     */
    protected $type = 'Create action test';

    /**
     * @var string
     */
    protected $action = 'Create';
}
