<?php
namespace Core;

function view($name, $data = [])
{
    extract($data);

    return require "core/views/{$name}.view.php";
}