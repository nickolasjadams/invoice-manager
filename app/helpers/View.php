<?php

namespace App\Helpers;

use App\Helpers\Facades\Log;
use Exception;

class View
{
    /**
     * Render a specified view.
     * 
     * @param $resource_view - The name of the view minus '.view.php'
     */
    public static function render($resource_view, $data = [])
    {
        $data = (object) $data;
        foreach($data as $key => $value) {
            $$key = $value;
        }
        try {
            $view_file = Path::root() . '/resources/views/' . $resource_view . '.view.php'; 
            if (is_file($view_file)) {
                require $view_file;
            } else {
                throw new Exception("Can't find provided view file.");
            }
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            // header('Location: /', 404);
            die('404 - Error: View not found');
        }

        
    }
}