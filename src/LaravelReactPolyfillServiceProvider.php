<?php

namespace MorningTrain\Laravel\React\Polyfill;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use MorningTrain\Laravel\Context\Events\ContextsBooting;
use MorningTrain\Laravel\Context\Context;

class LaravelReactPolyfillServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../public/mix-manifest.json' => public_path('vendor/laravel-react-polyfill/mix-manifest.json'),
                __DIR__ . '/../public/polyfill.js' => public_path('vendor/laravel-react-polyfill/polyfill.js'),
                __DIR__ . '/../public/polyfill.js.map' => public_path('vendor/laravel-react-polyfill/polyfill.js.map'),
            ], 'react-polyfill');
        }

        Event::listen(ContextsBooting::class, function ($event) {

            if(!Browser::supportsES5()) {
                dd('does not support es5');
            }

            if(Browser::isEvergreen()) {
                dd('evergreen');
            }

            if(Browser::isLegacy()) {
                dd('legacy');
            }

            Context::scripts([
                asset(mix('/polyfill.js', 'vendor/laravel-react-polyfill'))
            ]);
        });

    }

}
