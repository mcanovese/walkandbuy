<?php

use App\Core\App;


$config = require 'config.php';

require 'core/Router.php';

return new QueryBuilder(
    Connection::make($config['database'])
);