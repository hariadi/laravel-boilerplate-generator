<?php

use Illuminate\Support\Facades\Storage;

abstract class TestCase extends Orchestra\Testbench\TestCase
{
    protected $consoleOutput;

    protected function getPackageProviders($app)
    {
        return [\Hariadi\Boilerplate\GeneratorCommandServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('generator.path', __DIR__.'/temp');
    }

    public function setUp()
    {
        parent::setUp();
        exec('rm -rf '.__DIR__.'/temp/*');
    }

    public function tearDown()
    {
        exec('rm -rf '.__DIR__.'/temp/*');
        parent::tearDown();

        $this->consoleOutput = '';
    }

    public function resolveApplicationConsoleKernel($app)
    {
        $app->singleton('artisan', function ($app) {
            return new \Illuminate\Console\Application($app, $app['events'], $app->version());
        });

        $app->singleton('Illuminate\Contracts\Console\Kernel', Kernel::class);
    }

    public function artisan($command, $parameters = [])
    {
        parent::artisan($command, array_merge($parameters, ['--no-interaction' => true]));
    }

    public function consoleOutput()
    {
        return $this->consoleOutput ?: $this->consoleOutput = $this->app[Kernel::class]->output();
    }

    protected function getPath()
    {
        return __DIR__.'/temp';
    }
}
