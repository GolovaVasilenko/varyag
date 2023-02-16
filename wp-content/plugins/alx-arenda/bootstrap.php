<?php

if(session_status() == 1) {
    session_start();
}

function classes_autoload($class)
{
    $classPath = plugin_dir_path(__FILE__) . str_replace('\\', '/', $class) . '.php';
    if(file_exists($classPath)) {
        require_once $classPath;
    }
}
spl_autoload_register('classes_autoload');