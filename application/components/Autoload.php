<?php

 //function __autoload($class_name)
function my_autoloader($class_name)
{
    $array_paths = array(
        '/application/models/',
        '/application/components/'
    );
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            include_once $path;
        }
   }
}
spl_autoload_register('my_autoloader');
