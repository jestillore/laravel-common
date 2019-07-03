<?php

namespace Jestillore\Common\Console\Generators;

use Illuminate\Support\Str;

class ActionTestCaseGenerator extends AbstractTestGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:test-case {name} {--unit}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate action test case.';

    /**
     * @var string
     */
    protected $type = 'Action test case';

    /**
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/action_test_case.stub';
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
            str_replace('\\', '/', $path) . '/' . $this->getClassName($name) . 'TestCase.php';
    }
}
