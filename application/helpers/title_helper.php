<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

    if (!function_exists('set_title'))
    {
        function set_title($title) {
            $CI =& get_instance();
            $CI->header_title = $title;
        }
    }

    if (!function_exists('get_title'))
    {
        function get_title() {
            $CI =& get_instance();
            return $CI->header_title;
        }
    }

?>