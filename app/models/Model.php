<?php

namespace App\Models;

use Database\Connection as DB;
use PDO;

abstract class Model
{

    public static $records = [];

    /**
     * Assumes that table name is a lowercase plural match of the model classname.
     * For example: db.users -> App\Models\User
     *
     * @param $orderby optional column
     * @param $sort optional 'ASC', or 'DESC'
     * @return array
     */
    public static function all($orderby = null, $sort = null) {
        $db = DB::make();
        if ($orderby != null) {
            if ($sort == "ASC" || $sort == null) {
                $statement = $db->prepare('select * from ' . self::dbTableName() . " ORDER BY {$orderby};");
            } else if ($sort == "DESC") {
                $statement = $db->prepare('select * from ' . self::dbTableName() . " ORDER BY {$orderby} {$sort};");
            }
            
        } else  {
            $statement = $db->prepare('select * from ' . self::dbTableName());
        }
        $statement->execute();
        self::$records = $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());
        $db = null; // close connection
        return self::$records;
    }

    /**
     * Searches a whole table applying the WHERE clause.
     *
     * @param  string $column
     * @param  string $equality_operator =, >, <, <=, >=, <> (not equal), BETWEEN, LIKE, IN
     * @param  string $value
     * @return array
     */
    public static function where($column, $equality_operator, $value) {
        $db = DB::make();
        $sql  = 'SELECT * FROM ' . self::dbTableName() .
                ' WHERE ' . $column . ' ' . $equality_operator  . "(:value)" . ';';
        $statement = $db->prepare($sql);
        $statement->bindParam(':value', $value);
        $statement->execute();
        self::$records = $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());
        $db = null; // close connection
        return self::$records;
    }

    /**
     * Returns the assumed dbTableName based off the model classname.
     * This does not work with words like 'Person' -> 'people'
     * 
     * @return string
     */
    private static function dbTableName() {
        $class_name = get_called_class();
        $class_name = explode('App\\Models\\', $class_name)[1];
        $class_name = strtolower($class_name) . 's';
        return $class_name;
    }
    
    /**
     * Returns id of record.
     *
     * @return string id
     */
    public function id() {
        return $this->id;
    }
}