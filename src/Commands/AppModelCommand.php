<?php

namespace Hariadi\Boilerplate\Commands;

class AppModelCommand extends AppGeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:model
    	{name : The name of the class}
    	{--N|namespace= : The namespace class. Output strategy will follow this namespace}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent model class with attribute, relationship and scope traits';

    /**
     * The methods available.
     *
     * @var array
     */
    protected function getMethods()
    {
        return ['all', 'paginated', 'find', 'create', 'update', 'delete'];
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/model.stub';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (parent::handle() !== false) {
            $this->call('app:attribute', [
                'name' => $this->argument('name'),
                '--namespace' => $this->option('namespace')
            ]);

            $this->call('app:method', [
                'name' => $this->argument('name'),
                '--namespace' => $this->option('namespace')
            ]);

            $this->call('app:relationship', [
                'name' => $this->argument('name'),
                '--namespace' => $this->option('namespace')
            ]);

            $this->call('app:scope', [
                'name' => $this->argument('name'),
                '--namespace' => $this->option('namespace')
            ]);
        }
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $namespace = $this->option('namespace') ?? $this->argument('name');

        return $rootNamespace . '\Models' .'\\' . $namespace;
    }
}
