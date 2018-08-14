<?php

$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('about/culture','PagesController@aboutculture');
$router->get('contact','PagesController@contact');
$router->get('add-name','PagesController@add-name');
$router->get('add-user','PagesController@adduser');


/* ROUTES PRECEDENTI PRE-MODIFICA
$router->define([

  '' => 'app/controller/index.php',
  'about' => 'app/controller/about.php',
  'about/culture' => 'app/controller/about-culture.php',
  'contact' => 'app/controller/contact.php',

  'names' => 'app/controller/add-name.php',

]);
*/
