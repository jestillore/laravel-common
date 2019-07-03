<?php

namespace Jestillore\Common\Console\Generators;

class ModelGenerator extends AbstractGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:model {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate model.';

    /**
     * @var string
     */
    protected $type = 'Model';

    /**
     * @var string
     */
    protected $pathDirectory = 'Models/';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/model.stub';
    }

    /**
     * Get namespace
     *
     * @param string $name
     * @return string
     */
    protected function getNamespace($name)
    {
        return parent::getNamespace($name) . '\\Models';
    }
}
