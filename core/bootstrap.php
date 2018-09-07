<?php

/**
 * Executes the core of the server, requiring all the files
 */

namespace Core;
use Core\Database\Connection;
use Core\Database\QueryBuilder;


$config = require_once 'core/config.php';
require_once 'core/App.php';
require_once 'core/database/Connection.php';
require_once 'core/database/QueryBuilder.php';

require_once 'core/Router.php';
require_once 'core/Request.php';
require_once 'core/Session.php';


App::bind('config', $config);
App::bind('pdo', Connection::make(App::get('config')['database']));
App::bind('database', new QueryBuilder(App::get('pdo')));




function view(string $filename, array $data = []) {
  extract($data);

  return require_once "app/views/{$filename}.view.php";
}

function redirect(string $path) {
  $root = 'localhost:8888';

  header("Location: {$root}{$path}");
}
