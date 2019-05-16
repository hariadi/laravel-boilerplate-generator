<?php

namespace Hariadi\Boilerplate\Commands;

class AppRepositoryCommand extends AppGeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Default method of class being generated.
     *
     * @var array
     */
    protected $methods = ['all', 'paginated', 'find', 'create', 'update', 'delete', 'forceDelete', 'restore'];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:repository
    	{name : The model class name.}
    	{--d|disable-softdelete : Disable softdelete}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The methods available.
     *
     * @var array
     */
    protected function getMethods()
    {
        return $this->option('disable-softdelete')
            ? array_diff($this->methods, ['forceDelete', 'restore'])
            : $this->methods;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/repository.stub';
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
        return basename($this->getNameInput()) . 'Repository';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories' .'\\' . $this->argument('name');
    }
}
