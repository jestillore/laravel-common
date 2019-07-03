<?php

namespace Jestillore\Common\Console\Generators;

use Illuminate\Support\Str;

abstract class AbstractTestGenerator extends AbstractGenerator
{
    /**
     * @var string
     */
    protected $action;

    /**
     * @var bool
     */
    protected $plural = false;

    /**
     * @return string
     */
    protected function getTestType()
    {
        if ($this->option('unit')) {
            return 'unit';
        } else {
            return 'feature';
        }
    }

    /**
     * @return string
     */
    protected function getDomainContainer()
    {
        return '\\' . Str::studly($this->getTestType());
    }

    /**
     * @return string
     */
    protected function rootNamespace()
    {
        return 'Tests';
    }

    /**
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/' . Str::snake($this->action) . '_action_' . $this->getTestType() . '_test.stub';
    }

    /**
     * @param $name
     * @return array
     */
    protected function getReplaceValues($name)
    {
        $className = $this->getClassName($name);
        $action = $this->action . $className;

        return array_merge(parent::getReplaceValues($name), [
            'dummyTableName' => $this->getTableName(),
            'DUMMY_TABLE_NAME' => strtoupper(Str::plural(Str::snake($className)) . '_table'),
            'dummyItemDoc' => str_replace('_', ' ', Str::singular($this->getTableName())),
            'NamespacedDummyAction' => 'App\\Modules\\' . Str::plural($className) . '\\Actions\\' . $action . 'Action',
            'DummyAction' => $action
        ]);
    }

    /**
     * @param $name
     * @return string
     */
    public function getNamespacedModel($name)
    {
        $class = $this->getClassName($name);
        return 'App\\Modules\\' . Str::plural($class) . '\\Models\\' . $class;
    }

    /**
     * @param string $className
     * @return string
     */
    protected function getGeneratedClassName($className)
    {
        return $this->action .
            ($this->plural ? Str::plural($className) : Str::singular($className)) .
            Str::studly($this->getTestType()) .
            'Test.php';
    }

    /**
     * @param string $name
     * @return string
     */
    public function getPath($name)
    {
        $path = Str::plural(
            Str::replaceFirst($this->rootNamespace(), '', $name)
        );

        return base_path('tests') .
            str_replace('\\', '/', $path) . '/' . $this->getGeneratedClassName($this->getClassName($name));
    }
}
