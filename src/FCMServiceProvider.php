<?php

namespace MedianetFCM;

use Illuminate\Support\Str;
use MedianetFCM\Sender\FCMGroup;
use MedianetFCM\Sender\FCMSender;
use Illuminate\Support\ServiceProvider;

class FCMServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/fcm.php' => config_path('fcm.php'),
        ]);

        // Publishing migrations
        if (!class_exists('CreateNotificationsTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_notifications_table.stub.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_notifications_table.php'),
            ], 'migrations');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/fcm.php', 'fcm');

        $this->app->singleton('fcm.client', function ($app) {
            return (new FCMManager($app))->driver();
        });

        $this->app->bind('fcm.group', function ($app) {
            $client = $app['fcm.client'];
            $url = $app['config']->get('fcm.http.server_group_url');

            return new FCMGroup($client, $url);
        });

        $this->app->bind('fcm.sender', function ($app) {
            $client = $app['fcm.client'];
            $url = $app['config']->get('fcm.http.server_send_url');

            return new FCMSender($client, $url);
        });
    }

    public function provides()
    {
        return ['fcm.client', 'fcm.group', 'fcm.sender'];
    }
}
