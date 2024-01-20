<?php
spl_autoload_register('shippo_autoloader');

function shippo_autoloader($class_name) {
    $file_path = plugin_dir_path(__FILE__) . 'class_' . strtolower($class_name) . '.php';

    if (file_exists($file_path)) {
        require_once $file_path;
    }
}
