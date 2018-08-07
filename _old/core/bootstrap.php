<?php

use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection};


$config = require 'config.php';

require 'core/Router.php';

return new QueryBuilder(
    Connection::make($config['database'])
);
