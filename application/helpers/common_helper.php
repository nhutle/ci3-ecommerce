<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// Get public url:
if (!function_exists('public_url')) {
    function public_url($url = '') {
        return base_url('public/' . $url);
    }
}

// print items in array format:
if (!function_exists('pre')) {
    function pre($list, $exit = true) {
        echo '<pre>';
        print_r($list);

        if ($exit) {
            die();
        }
    }
}
