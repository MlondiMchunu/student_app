<?php
function autoload($className) {
    $classPath = __DIR__ . '/../classes/' . $className . '.php';
    if (file_exists($classPath)) {
        include_once $classPath;
    }
}

spl_autoload_register('autoload');
?>
