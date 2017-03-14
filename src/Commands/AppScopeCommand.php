<?php

namespace Hariadi\Boilerplate\Commands;

class AppScopeCommand extends AppGeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Scope';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scope {name : The name of the class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new scope traits for model';

    /**
     * The methods available.
     *
     * @var array
     */
    protected function getMethods()
    {
        return [];
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/scope.stub';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        parent::handle();
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return $this->argument('name');
    }

    /**
     * Get the intended name for class.
     *
     * @return string
     */
    protected function getClassName()
    {
        return basename($this->getNameInput()) . $this->type;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models' . '\\' . $this->argument('name') . '\Traits' .  '\\' . $this->type;
    }
}
