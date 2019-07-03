<?php

namespace Jestillore\Common\Console\Generators;

use Illuminate\Console\Command;

class ActionsGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:actions {name} {--all} {--create} {--list} {--paginate} {--view} {--update} {--delete}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate actions';

    /**
     * @var array
     */
    protected $actions = [
        'create',
        'list',
        'paginate',
        'view',
        'update',
        'delete'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Generate action
     *
     * @param string $name
     * @param string $action
     */
    protected function generateAction(string $name, string $action)
    {
        $this->call('make:module:action:' . $action, [
            'name' => $name
        ]);
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $name = $this->argument('name');

        if ($this->option('all')) {
            foreach ($this->actions as $action) {
                $this->generateAction($name, $action);
            }
        } else {
            foreach ($this->actions as $action) {
                if ($this->option($action)) {
                    $this->generateAction($name, $action);
                }
            }
        }
    }
}
