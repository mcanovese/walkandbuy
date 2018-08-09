<?php
use App\Core\Router;
use App\Core\Request;
require 'core/bootstrap.php';


require Router::load('routes.php')
  ->direct(Request::uri());
