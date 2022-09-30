<?php

if (!function_exists('format_date')) {
    function format_date($value, $with_time = true)
    {
        $format = "F dS Y";
        if ($with_time) {
            $format .= " H:iA";
        }
        return date($format, strtotime($value));
    }
}
