<?php

$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('about/culture','PagesController@aboutculture');
$router->get('contact','PagesController@contact');
$router->get('add-name','PagesController@add-name');
$router->get('add-user','PagesController@addUser');


$router->get('users','UsersController@index');
