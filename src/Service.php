<?php

namespace lstore;

use think\Route;

class Service extends \think\Service
{
    // public function register()
    // {
    // }
    public function boot()
    {
        $this->registerRoutes(function (Route $route) {
            $route->get('/store', '\Lstore\controller\settings@index');
            $route->get('/store/index', '\Lstore\controller\settings@index');
            $route->post('/store/save', '\Lstore\controller\settings@save');
        });
    }
}
