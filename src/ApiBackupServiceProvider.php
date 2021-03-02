<?php

namespace Encore\ApiBackup;

use Encore\Admin\Admin;
use Illuminate\Support\ServiceProvider;

class ApiBackupServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(ApiBackup $extension)
    {
        if (! ApiBackup::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'apibackup');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/apibackup')],
                'apibackup'
            );
        }

        $this->app->booted(function () {
            ApiBackup::routes(__DIR__.'/../routes/web.php');
        });

        // Admin::css('vendor/laravel-admin-ext/apibackup/down.css');
        Admin::js('vendor/laravel-admin-ext/apibackup/layer/layer.js');
        Admin::js('vendor/laravel-admin-ext/apibackup/jquery.form.js');
        // Admin::js('vendor/laravel-admin-ext/apibackup/functions.js');
    }

    // public function handle()
    // {
    //     Admin::booting(function () {
    //         Admin::js('vendor/laravel-admin-ext/apibackup/layer/layer.js');
    //         Admin::js('vendor/laravel-admin-ext/apibackup/jquery.form.js');
    //     });
    // }
}