<?php

namespace lsstore;

use think\Route;

class Service extends \think\Service
{
    public function register()
    {
        echo 'register';
    }
    public function boot()
    {
        $this->registerRoutes(function (Route $route) {
            $route->get('/store', '\Lsstore\controller\settings@index');
        });
    }
}
