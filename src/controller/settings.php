<?php

namespace lstore\controller;

use app\BaseController;
use think\facade\Config;

error_reporting(E_ERROR | E_WARNING | E_PARSE);
class Settings extends BaseController
{
    public function index()
    {
        $post_max_size = ini_get('post_max_size');
        $post_max_size = $post_max_size > 0 ? $this->bytecount($post_max_size) / 1024 : 0;
        Config::set(['view_path' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR, 'view_suffix' => 'tpl'], 'view');
        return view('index', ['settings' => get_storage_info(), 'post_max_size' => $post_max_size]);
    }

    public function save()
    {
        foreach ($_POST as $key => $val) {
            $_POST[$key] = trim($_POST[$key]);
        }
        return set_storage_info($_POST);
    }
    private function bytecount($str)
    {
        if (strtolower($str[strlen($str) - 1]) == 'b') {
            $str = substr($str, 0, -1);
        }
        if (strtolower($str[strlen($str) - 1]) == 'k') {
            return floatval($str) * 1024;
        }
        if (strtolower($str[strlen($str) - 1]) == 'm') {
            return floatval($str) * 1048576;
        }
        if (strtolower($str[strlen($str) - 1]) == 'g') {
            return floatval($str) * 1073741824;
        }
    }
}
