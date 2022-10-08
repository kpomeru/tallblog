<?php

if (!function_exists('format_date')) {
    function format_date($value, $with_time = true, $date_format = "F jS Y", $time_format = "H:ia")
    {
        $format = $date_format;
        if ($with_time) {
            $format .= " {$time_format}";
        }
        return date($format, strtotime($value));
    }
}
