<?php

namespace App\Helpers;

use App\Helpers\Facades\Log;

class Path 
{

    public static function root($max_depth = 10)
    {
        $initial_location = getcwd();
        $i = 0;
        while ($i < $max_depth)
        {
            if (is_dir('app') && is_dir('www') && is_dir('resources')) {
                return getcwd();
            }
            chdir('..');
            $i++;
        }
        Log::debug('Root not found from ' . $initial_location . ' with a max depth of ' . $max_depth);
    }

    public static function views() {
        return self::root() . "/resources/views/";
    }

    public static function toNameSpace($php_class_path) {
        // remove file extension
        $php_class_path = explode('.php', $php_class_path)[0];
        // remove root path
        $php_class_path = explode(Path::root() . '/', $php_class_path)[1];
        // format as namespace
        $php_class_path = str_replace('/', '\\', $php_class_path);
        $php_class_path = ucwords($php_class_path, '\\');
        return $php_class_path;
    }

}
