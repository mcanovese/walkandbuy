<?php

$articoli = $app['database']->selectAll('articoli');
require 'views/index.view.php';
