<?php

namespace App\Helpers\Facades;

use Katzgrau\KLogger\Logger;
use App\Helpers\Path;

/**
 * A static wrapper for KLogger
 */
class Log 
{

    public static function info($message) 
    {
        $logger = new Logger(Path::root() . '/logs');
        $logger->info($message);
    }

    public static function error($message) 
    {
        $logger = new Logger(Path::root() . '/logs');
        $logger->error($message);
    }

    public static function debug($message) 
    {
        $logger = new Logger(Path::root() . '/logs');
        $logger->debug($message);
    }

}