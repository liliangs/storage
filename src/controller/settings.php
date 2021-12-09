<?php

namespace lsstore\controller;

use app\BaseController;

class Settings extends BaseController
{
    public function index()
    {
        return 'isok';
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
}
