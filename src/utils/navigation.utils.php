<?php

function from($path)
{
    return BASE_PATH . "src/" . $path;
}


function display($path, $attributes = [])
{
    $fullPath = BASE_PATH . "src/views/" . $path;
    if (!file_exists($fullPath)) {
        throw new Exception("File not found: $fullPath");
    }

    extract($attributes);
    require $fullPath;
}

function redirect($path)
{
    header("location: {$path}");
    die();
}