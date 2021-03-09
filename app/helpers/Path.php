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

}
