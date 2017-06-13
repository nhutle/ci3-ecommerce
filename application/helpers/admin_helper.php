<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// Get admin url:
if (!function_exists('admin_url')) {
    function admin_url($url = '') {
        return base_url('admin/' . $url);
    }
}
