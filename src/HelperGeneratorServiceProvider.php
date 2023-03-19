<?php

namespace RaviyaTechnical\HelperGenerator;

use Illuminate\Support\ServiceProvider;
use RaviyaTechnical\HelperGenerator\Console\MakeHelper;

class HelperGeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadHelpers();
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([MakeHelper::class]);
        }
    }

    protected function loadHelpers()
    {
        foreach (glob(app_path().'/Helpers/*.php') as $filename)
        {
            require_once $filename;
        }
        // foreach (glob(__DIR__.'/../Helpers/*.php') as $filename)
        // {
        //     require_once $filename;
        // }
    }
}
