<?php
    
    require 'core/bootstrap.php';
    $router = new Router; 
    require 'app/routes.php';

$uri = trim($_SERVER['REQUEST_URI'],'/');
                
require $router->direct($uri);