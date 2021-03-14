<?php

namespace App\Helpers;

use DateTime;

class DateTimeX extends DateTime
{
    /**
     * Sets a date in database format.
     * @param int $month
     * @param int $day
     * @param int $year
     * @return string
     */
    public static function dbFormat($month, $day, $year) {
        return (new DateTime())
            ->setDate($year, $month, $day)
            ->setTime(0, 0, 0, 0) // midnight
            ->format('Y-m-d H:i:s');
    }

    public static function displayFormat($date_str) {
        return date_format(date_create($date_str), 'm/d/Y');
    }
}