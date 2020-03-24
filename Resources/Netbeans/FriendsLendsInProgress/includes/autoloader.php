<?php
spl_autoload_register('myautoloader');

function myautoloader($classname){
    $path = "classes/";
    $extension = ".php";
    $fullpath = $path . $classname . $extension;
    
    include_once $fullpath;
}

