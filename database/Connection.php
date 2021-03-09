<?php

namespace Database;

use App\Helpers\Facades\Log;
use \Exception;
use \PDO;
use \PDOException;

class Connection 
{   

    /**
     * Returns a connection details object.
     */
    protected static function getDetails() {
        $mandatory = [ 'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'DB_HOST' ];
        foreach($mandatory as $detail) {
            try {
                if (getenv($detail) === false) {
                    throw new Exception('Missing Connection Details');
                }
            } catch (Exception $e) {
                $message = 'Could not connect: ' . $e->getMessage();
                Log::error($message);
                die($message);
            }
        }

        $connection_details = [
            'name' => getenv('DB_NAME'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
            'host' => getenv('DB_HOST')
        ];
        
        return (object) $connection_details;
    }


    /**
     * Returns a PHP Database Object.
     */
    public static function make()
    {
        try {
            $db = Connection::getDetails();
            $dsn = 'mysql:host=' . $db->host . ';dbname=' . $db->name;
            return new PDO($dsn, $db->user, $db->password);
        } catch (PDOException $e) {
            $message = 'Could not connect';
            Log::error($message);
            die($message);
        }
    }

}