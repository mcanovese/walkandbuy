<?php

$router->get('','PagesController@home');
$router->get('whoAreWe','PagesController@whoAreWe');
$router->get('partner','PagesController@partner');
$router->get('howWork','PagesController@howWork');
$router->get('contact','PagesController@contact');
$router->get('add-user','PagesController@addUser');

$router->get('item','PagesController@item');


$router->get('users','UsersController@index');
