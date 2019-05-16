<?php

namespace Hariadi\Boilerplate;

use Illuminate\Support\ServiceProvider;
use Hariadi\Boilerplate\Commands\AppEventCommand;
use Hariadi\Boilerplate\Commands\AppModelCommand;
use Hariadi\Boilerplate\Commands\AppScopeCommand;
use Hariadi\Boilerplate\Commands\AppMethodCommand;
use Hariadi\Boilerplate\Commands\AppAttributeCommand;
use Hariadi\Boilerplate\Commands\AppRepositoryCommand;
use Hariadi\Boilerplate\Commands\AppEventCreatedCommand;
use Hariadi\Boilerplate\Commands\AppEventDeletedCommand;
use Hariadi\Boilerplate\Commands\AppEventUpdatedCommand;
use Hariadi\Boilerplate\Commands\AppRelationshipCommand;
use Hariadi\Boilerplate\Commands\AppEventListenerCommand;

class GeneratorCommandServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerGeneratorCommands();
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }

    /**
     * Register console commands.
     */
    protected function registerGeneratorCommands()
    {
        $this->commands([
            AppModelCommand::class,
            AppScopeCommand::class,
            AppMethodCommand::class,
            AppAttributeCommand::class,
            AppRepositoryCommand::class,
            AppRelationshipCommand::class,
            AppEventCreatedCommand::class,
            AppEventUpdatedCommand::class,
            AppEventDeletedCommand::class,
            AppEventListenerCommand::class,
        ]);
    }
}
