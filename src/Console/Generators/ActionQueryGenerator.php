<?php

namespace Jestillore\Common\Console\Generators;

class ActionQueryGenerator extends AbstractGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:action-query {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate action query class.';

    /**
     * @var string
     */
    protected $stubFileName = 'action_query.stub';

    /**
     * @var string
     */
    protected $type = 'Action query';

    /**
     * @var string
     */
    protected $pathDirectory = 'Traits/';

    /**
     * @param string $name
     * @return string
     */
    protected function getNamespace($name)
    {
        return parent::getNamespace($name) . '\\Traits';
    }

    /**
     * @param string $className
     * @return string
     */
    protected function getGeneratedClassName($className)
    {
        return $className . 'ActionQuery';
    }

    /**
     * @param $name
     * @return string
     */
    protected function getFileName($name)
    {
        return $this->getClassName($name) . 'ActionQuery.php';
    }
}
