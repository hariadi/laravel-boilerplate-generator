<?php

namespace Hariadi\Boilerplate\Commands;

class AppEventListenerCommand extends AppGeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'EventListener';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:listener {name : The name of the class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new event listener for model';

    /**
     * The methods available.
     *
     * @var array
     */
    protected function getMethods()
    {
        return ['created', 'updated', 'deleted'];
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/listener.stub';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	// $event = $this->option('event');

     //    if ($event != 'created') {
     //        $this->methods = [$event];
     //    }

     //    dd($this->methods);

        parent::handle();
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
        $namespace = $this->argument('name');

        return $rootNamespace . '\Listeners\Backend' . '\\' . $namespace;
    }
}
