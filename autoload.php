<?php

spl_autoload_register(function ($className) {
    $filename = 'src/' . $className . '.php';
    if (file_exists($filename)) {
        include_once $filename;
    }
});
