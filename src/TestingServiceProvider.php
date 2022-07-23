<?php

namespace Hyde\Testing;

use Illuminate\Support\ServiceProvider;

class TestingServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->register(new class($this->app) extends \Laravel\Dusk\DuskServiceProvider
        {
            /** @inheritDoc */
            public function boot()
            {
                if ($this->app->runningInConsole()) {
                    $this->commands([
                        \Laravel\Dusk\Console\InstallCommand::class,
                        \Laravel\Dusk\Console\DuskCommand::class,
                        \Laravel\Dusk\Console\DuskFailsCommand::class,
                        \Laravel\Dusk\Console\MakeCommand::class,
                        \Laravel\Dusk\Console\PageCommand::class,
                        \Laravel\Dusk\Console\PurgeCommand::class,
                        \Laravel\Dusk\Console\ComponentCommand::class,
                        \Laravel\Dusk\Console\ChromeDriverCommand::class,
                    ]);
                }
            }
        });
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }
}
