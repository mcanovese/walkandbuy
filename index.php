<?php

require 'core/bootstrap.php';
use Core\Router;
use Core\Request;

Router::load('routes.php')
  ->direct(Request::uri(),Request::method());
