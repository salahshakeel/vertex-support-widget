<?php

namespace Vertex\SupportWidget;


use Illuminate\Support\ServiceProvider;


class VertexSupportServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->mergeConfigFrom(
            __DIR__.'/../config/vertex-support.php',
            'vertex-support'
        );

    }



    public function boot()
    {


        $this->loadViewsFrom(
            __DIR__.'/../resources/views',
            'vertex-support'
        );


        $this->loadRoutesFrom(
            __DIR__.'/../routes/web.php'
        );



        $this->publishes([

            __DIR__.'/../config/vertex-support.php'
            =>
            config_path('vertex-support.php'),

        ],
        'vertex-support-config');



        $this->publishes([

            __DIR__.'/../resources/css'
            =>
            public_path('vendor/vertex-support/css'),


            __DIR__.'/../resources/js'
            =>
            public_path('vendor/vertex-support/js'),

        ],
        'vertex-support-assets');

    }

}