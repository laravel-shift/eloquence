<?php
namespace Eloquence;

use Eloquence\Commands\RebuildCaches;
use Eloquence\Utilities\DBQueryLog;
use Illuminate\Support\ServiceProvider;

class EloquenceServiceProvider extends ServiceProvider
{
    /**
     * Initialises the service provider, and here we attach our own blueprint
     * resolver to the schema, so as to provide the enhanced functionality.
     */
    public function boot()
    {
        DBQueryLog::enable();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('command.eloquence:rebuild', RebuildCaches::class);

        $this->commands(['command.eloquence:rebuild']);
    }
}
