<?php

/*
 * This file is part of Laravel Twilio.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ABR\Twilio;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

/**
 * This is the twiolio service provider.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class TwilioServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    public function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/twilio.php');

        if (class_exists('Illuminate\Foundation\Application', false)) {
            $this->publishes([$source => config_path('twilio.php')]);
        }

        $this->mergeConfigFrom($source, 'twilio');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('twilio', function (Container $app) {
            $config = $app->config->get('twilio');

            return new Twilio(
                array_get($config, 'account_sid'),
                array_get($config, 'auth_token')
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     *@return string[]
     */
    public function provides()
    {
        return [
            'twilio',
        ];
    }
}
