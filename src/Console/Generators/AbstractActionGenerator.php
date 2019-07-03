<?php

namespace Jestillore\Common\Console\Generators;

use Illuminate\Support\Str;

abstract class AbstractActionGenerator extends AbstractGenerator
{
    /**
     * @var string
     */
    protected $type = 'Create action';

    /**
     * @var string
     */
    protected $pathDirectory = 'Actions/';

    /**
     * @var string
     */
    protected $action;

    /**
     * @var bool
     */
    protected $plural = false;

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/' . Str::snake($this->action) . '_action.stub';
    }

    /**
     * Get file name
     *
     * @param $name
     * @return string
     */
    protected function getFileName($name)
    {
        return $this->action . $this->getClassName($name) . 'Action.php';
    }

    /**
     * Get generated class name
     *
     * @param string $className
     * @return string
     */
    protected function getGeneratedClassName($className)
    {
        return $this->action . parent::getGeneratedClassName($className) . 'Action';
    }
}
