<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// Get Age:
if (!function_exists('public_url')) {
    function public_url($url = '') {
        return base_url('public/' . $url);
    }
}
