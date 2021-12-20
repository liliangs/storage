<?php

namespace Local;

set_time_limit(0);
class Client
{
    protected $web_path;
    protected $web_path_other;
    protected $app_path;
    protected $app_path_other;
    protected $settings;
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->settings = get_storage_info();
        $this->loadfunction();
    }
    public function local_up($file, $name, $app)
    {
        $allowExt = array();
        $image_ext = !empty($this->settings['imageext']) ? explode(',', $this->settings['imageext']) : array('gif', 'jpg', 'jpeg', 'bmp', 'png', 'ico');
        $video_ext = !empty($this->settings['videoext']) ? explode(',', $this->settings['videoext']) : array('mp4', 'mp3', 'avi');
        $other_ext = !empty($this->settings['otherext']) ? explode(',', $this->settings['otherext']) : array('doc', 'xls');
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $allowExt = array_merge($allowExt, $image_ext, $video_ext, $other_ext);
        if (!in_array(strtolower($ext), $allowExt)) {
            return '不允许上传此类文件';
        }
        if (!strexists($name, $ext)) {
            $name .= '.' . $ext;
        }
        if (!empty($this->config['otherdir'])) {
            $otherdir = $this->fixpath($this->config['otherdir']);
        } else {
            $otherdir = '/';
        }
        if ($app) {
            if (in_array(strtolower($ext), $image_ext)) {
                $save_path = $this->app_path;
                $curls = $this->siteroot() . $otherdir . 'attachment/app/image/';
            } else {
                $save_path = $this->app_path_other;
                $curls = $this->siteroot() . $otherdir . 'attachment/app/other/';
            }
        } else {
            if (in_array(strtolower($ext), $image_ext)) {
                $save_path = $this->web_path;
                $curls = $this->siteroot() . $otherdir . 'attachment/web/image/';
            } else {
                $save_path = $this->web_path_other;
                $curls = $this->siteroot() . $otherdir . 'attachment/web/other/';
            }
        }
        if (!empty($this->config['dirname'])) {
            $curls = $curls . $this->config['dirname'] . '/';
        }
        $save_name =  $save_path . $name;
        if (!$this->store_file_move($file['tmp_name'], $save_name)) {
            return '文件上传失败, 请将 attachment 目录权限先777 <br> (如果777上传失败,可尝试将目录设置为755)';
        } else {
            return $curls . $name;
        }
    }
    public function local_del($url)
    {
        $f_path = $this->web_path_other;
        if (strpos($url, 'app/image') !== false) {
            $f_path = $this->app_path;
        } elseif (strpos($url, 'app/other') !== false) {
            $f_path = $this->app_path_other;
        } elseif (strpos($url, 'web/image') !== false) {
            $f_path = $this->web_path;
        } else {
            $f_path = $this->web_path_other;
        }
        $dfurl = substr($url, strripos($url, "/") + 1);
        $file = $f_path . $dfurl;
        if (file_exists($file)) {
            @unlink($file);
        }
        return $file;
    }
    private function loadfunction()
    {
        if (!empty($this->config['dirname'])) {
            $this->web_path = public_path() . 'attachment' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . $this->config['dirname'] . DIRECTORY_SEPARATOR;
            $this->web_path_other = public_path() . 'attachment' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'other' . DIRECTORY_SEPARATOR . $this->config['dirname'] . DIRECTORY_SEPARATOR;
            $this->app_path = public_path() . 'attachment' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . $this->config['dirname'] . DIRECTORY_SEPARATOR;
            $this->app_path_other = public_path() . 'attachment' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'other' . DIRECTORY_SEPARATOR . $this->config['dirname'] . DIRECTORY_SEPARATOR;
        } else {
            $this->web_path = public_path() . 'attachment' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR;
            $this->web_path_other = public_path() . 'attachment' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'other' . DIRECTORY_SEPARATOR;
            $this->app_path = public_path() . 'attachment' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR;
            $this->app_path_other = public_path() . 'attachment' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'other' . DIRECTORY_SEPARATOR;
        }
    }
    private function store_mkdirs($path)
    {
        if (!is_dir($path)) {
            $this->store_mkdirs(dirname($path));
            @mkdir($path);
        }
        return is_dir($path);
    }
    private function store_file_move($file, $tofile)
    {
        $this->store_mkdirs(dirname($tofile));
        if (@is_uploaded_file($file)) {
            @move_uploaded_file($file, $tofile);
        } else {
            @rename($file, $tofile);
        }
        if (!file_exists($tofile)) {
            @copy($file, $tofile);
        }
        return is_file($tofile);
    }
    private function siteroot()
    {
        $ishttp = isset($_SERVER['SERVER_PORT']) && 443 == $_SERVER['SERVER_PORT'] ||
            isset($_SERVER['HTTP_FROM_HTTPS']) && 'on' == strtolower($_SERVER['HTTP_FROM_HTTPS']) ||
            (isset($_SERVER['HTTPS']) && 'off' != strtolower($_SERVER['HTTPS'])) ||
            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' == strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) ||
            isset($_SERVER['HTTP_X_CLIENT_SCHEME']) && 'https' == strtolower($_SERVER['HTTP_X_CLIENT_SCHEME']) ? true : false;
        $sitescheme = $ishttp ? 'https://' : 'http://';
        $host = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : ''));
        return htmlspecialchars($sitescheme . $host);
    }
    protected function fixpath($p)
    {
        $p = str_replace('\\', '/', trim($p));
        return (substr($p, -1) != '/') ? $p .= '/' : $p;
    }
}
