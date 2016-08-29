<?php

/*
 * Copyright (C) 2016 SINA Corporation
 *  
 *  
 * 
 * This script is firstly created at 2016-08-29.
 * 
 * To see more infomation,
 *    visit our official website http://app.finance.sina.com.cn/.
 */

namespace Jiaojie\Laravel\Storage\Providers;

use Illuminate\Support\ServiceProvider;
use Jiaojie\Laravel\Storage\Sina\Client;
use Jiaojie\Laravel\Storage\Sina\Adapter;
use Jiaojie\Laravel\Storage\Sina\FilesystemImpl as Filesystem;
use Storage;

/**
 * Description of S3Provider
 *
 * @encoding UTF-8 
 * @author jiaojie <jiaojie@staff.sina.com.cn> 
 * @since 2016-08-29 19:31 (CST) 
 * @version 0.1
 * @description 
 */
class S3Provider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        Storage::extend('sina', function($app, $config) {
            $client = new Client($config['access_key'], $config['secret_key'], $config["use_ssl"], $config["endpoint"], $config["bucket"]);
            return new Filesystem(new Adapter($client));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
