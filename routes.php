<?php

$router->get('','app/controller/index.php');
$router->get('about','app/controller/about.php');
$router->get('about/culture','app/controller/about-culture.php');
$router->get('contact','app/controller/contact.php');
$router->post('names','app/controller/add-name.php');


/* ROUTES PRECEDENTI PRE-MODIFICA
$router->define([

  '' => 'app/controller/index.php',
  'about' => 'app/controller/about.php',
  'about/culture' => 'app/controller/about-culture.php',
  'contact' => 'app/controller/contact.php',

  'names' => 'app/controller/add-name.php',

]);
*/
