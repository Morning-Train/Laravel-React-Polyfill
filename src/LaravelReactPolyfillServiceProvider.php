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
                __DIR__ . '/../public/polyfill-es5.js' => public_path('vendor/laravel-react-polyfill/polyfill-es5.js'),
                __DIR__ . '/../public/polyfill-es5.js.map' => public_path('vendor/laravel-react-polyfill/polyfill-es5.js.map'),
                __DIR__ . '/../public/polyfill-es6.js' => public_path('vendor/laravel-react-polyfill/polyfill-es6.js'),
                __DIR__ . '/../public/polyfill-es6.js.map' => public_path('vendor/laravel-react-polyfill/polyfill-es6.js.map'),
                __DIR__ . '/../public/polyfill-next.js' => public_path('vendor/laravel-react-polyfill/polyfill-next.js'),
                __DIR__ . '/../public/polyfill-next.js.map' => public_path('vendor/laravel-react-polyfill/polyfill-next.js.map'),
            ], 'react-polyfill');
        }

        Event::listen(ContextsBooting::class, function ($event) {

            if(!Browser::supportsES5()) {
                Context::scripts([
                    asset(mix('/polyfill-es5.js', 'vendor/laravel-react-polyfill'))
                ]);
            }

            if(!Browser::supportsES6()) {
                Context::scripts([
                    asset(mix('/polyfill-es6.js', 'vendor/laravel-react-polyfill'))
                ]);
            }

            Context::scripts([
                asset(mix('/polyfill-next.js', 'vendor/laravel-react-polyfill'))
            ]);
        });

    }

}
