<?php

namespace Hariadi\Boilerplate\Commands;

class AppEventCreatedCommand extends AppGeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Created';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:created
    	{name : The name of the class}
    	{--E|event=* : Default created event}';

    /**
     * Default events
     *
     * @var array
     */
    protected $events = ['created', 'updated', 'deleted'];

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new created event for model';

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
        return __DIR__.'/stubs/event.stub';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $events = $this->option('event');

        if (empty($events)) {
        	$events = $this->events;
        }

        if (parent::handle() !== false) {
            if (in_array('updated', $events)) {
                $this->call('event:updated', [
                    'name' => $this->argument('name'),
                ]);
            }

            if (in_array('deleted', $events)) {
                $this->call('event:deleted', [
                    'name' => $this->argument('name'),
                ]);
            }


            $this->call('app:listener', [
                'name' => $this->argument('name')
            ]);

            $this->info('You need to subscribe the listener to your EventServiceProvider manually');
        }
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

        return $rootNamespace . '\Events\Backend' . '\\' . $namespace;
    }
}
