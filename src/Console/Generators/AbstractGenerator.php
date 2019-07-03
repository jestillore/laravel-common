<?php

namespace Jestillore\Common\Console\Generators;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

abstract class AbstractGenerator extends GeneratorCommand
{
    /**
     * @var string
     */
    protected $pathDirectory = '';

    /**
     * @var string
     */
    protected $stubFileName;

    /**
     * Get class name
     *
     * @param $name
     * @return mixed
     */
    protected function getClassName($name)
    {
        $names = explode('\\', $name);
        $name = array_pop($names);
        return Str::singular($name);
    }

    /**
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/' . $this->stubFileName;
    }

    /**
     * Get namespace
     *
     * @param string $name
     * @return string
     */
    protected function getNamespace($name)
    {
        return parent::getNamespace($name) . '\\' . Str::plural($this->getClassName($name));
    }

    /**
     * @param string $className
     * @return string
     */
    protected function getGeneratedClassName($className)
    {
        return $className;
    }

    /**
     * Replace class
     *
     * @param string $stub
     * @param string $name
     * @return mixed
     */
    protected function replaceClass($stub, $name)
    {
        $class = $this->getClassName($name);
        return str_replace('DummyClass', $this->getGeneratedClassName($class), $stub);
    }

    /**
     * Get default namespace
     *
     * @param string $rootNamespace
     * @return string
     */
    public function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . $this->getDomainContainer();
    }

    /**
     * @return string
     */
    protected function getDomainContainer()
    {
        return '\Modules';
    }

    /**
     * Get file name
     *
     * @param $name
     * @return string
     */
    protected function getFileName($name)
    {
        return $this->getClassName($name) . '.php';
    }

    /**
     * Get path
     *
     * @param string $name
     * @return string
     */
    public function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->laravel['path'] . '/' . str_replace('\\', '/', Str::plural($name)) . '/' . $this->pathDirectory . $this->getFileName($name);
    }

    /**
     * Get namespaced model
     *
     * @param $name
     * @return string
     */
    public function getNamespacedModel($name)
    {
        return self::getNamespace($name) . '\\Models\\' . $this->getClassName($name);
    }

    /**
     * Get action query class
     *
     * @param $name
     * @return string
     */
    public function getActionQueryClass($name)
    {
        return $this->getClassName($name) . 'ActionQuery';
    }

    /**
     * Get namespaced action query
     *
     * @param $name
     * @return string
     */
    public function getNamespacedActionQuery($name)
    {
        return self::getNamespace($name) . '\\Traits\\' . $this->getActionQueryClass($name);
    }

    /**
     * Get table name
     *
     * @return string
     */
    public function getTableName()
    {
        return Str::plural(
            str_replace('/', '', Str::snake($this->getNameInput()))
        );
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            $this->getPlaceHolders($name),
            $this->getValues($name),
            $stub
        );

        return $this;
    }

    /**
     * @param $name
     * @return array
     */
    protected function getReplaceValues($name)
    {
        return [
            'DummyNamespace' => $this->getNamespace($name),
            'DummyRootNamespace' =>  $this->rootNamespace(),
            'NamespacedDummyModel' => $this->getNamespacedModel($name),
            'NamespacedActionQuery' => $this->getNamespacedActionQuery($name),
            'DummyModel' => $this->getClassName($name),
            'DummyActionQuery' => $this->getActionQueryClass($name),
            'dummySingularModel' => Str::singular(Str::camel($this->getClassName($name))),
            'dummyPluralModel' => Str::plural(Str::camel($this->getClassName($name))),
            'dummySnakeModel' => Str::snake($this->getClassName($name))
        ];
    }

    /**
     * Get placeholders
     *
     * @param string $name
     * @return array
     */
    protected function getPlaceHolders($name)
    {
        return array_keys($this->getReplaceValues($name));
    }

    /**
     * Get replace values
     *
     * @param $name
     * @return array
     */
    protected function getValues($name)
    {
        $values = [];
        foreach ($this->getReplaceValues($name) as $key => $value) {
            $values[] = $value;
        }
        return $values;
    }
}
