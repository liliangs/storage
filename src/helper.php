<?php
spl_autoload_register(function ($class) {
    $class = ltrim($class, '\\');
    $namespace = 'lstore';
    if (strpos($class, $namespace) === 0) {
        $class = substr($class, strlen($namespace));
        $path = '';
        if (($pos = strripos($class, '\\')) !== false) {
            $path = str_replace('\\', '/', substr($class, 0, $pos)) . '/';
            $class = substr($class, $pos + 1);
        }
        $path .= str_replace('_', '/', $class) . '.php';
        $dir = __DIR__ . $path;
        if (file_exists($dir)) {
            include $dir;
            return true;
        }
        return false;
    }
    return false;
});
if (!function_exists('set_storage_info')) {
    function set_storage_info($data)
    {
        $re = @file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'settings.json', json_encode($data));
        if (!$re) {
            $fp = @fopen(__DIR__ . DIRECTORY_SEPARATOR . 'settings.json', 'w');
            $re = @fwrite($fp, json_encode($data));
            @fclose($fp);
        }
        return $re;
    }
}
if (!function_exists('get_storage_info')) {
    function get_storage_info()
    {
        $re = @file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'settings.json');
        if (!$re) {
            $re = @readfile(__DIR__ . DIRECTORY_SEPARATOR . 'settings.json');
        }
        if (!empty($re)) {
            return json_decode($re, true);
        } else {
            return array();
        }
    }
}
// if (!function_exists('storage_save')) {
//     function storage_save($file, $name)
//     {
//         $lstore = new \lstore\Store();
//     }
// }
// if (!function_exists('storage_del')) {
//     function storage_del($url)
//     {
//         $re = @file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'settings.json');
//         if (!$re) {
//             $re = @readfile(__DIR__ . DIRECTORY_SEPARATOR . 'settings.json');
//         }
//         if (!empty($re)) {
//             return json_decode($re, true);
//         } else {
//             return array();
//         }
//     }
// }
