<?php

namespace Jestillore\Common\Console\Generators;

class FactoryGenerator extends AbstractGenerator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:factory {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate factory.';

    /**
     * @var string
     */
    protected $type  = 'Factory';

    /**
     * @var string
     */
    protected $stubFileName = 'factory.stub';

    /**
     * @param string $name
     * @return string
     */
    public function getPath($name)
    {
        return $this->laravel->databasePath() . '/factories/' . $this->getClassName($name) . 'Factory.php';
    }
}
